<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use App\Conversations\ExampleConversation;
use App\Conversations\RegisterConversation;
use App\Conversations\WelcomeConversation;
use App\Models\User;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        // Load the driver(s) you want to use
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);


        $botman = BotManFactory::create(["telegram" => [
            "token" => env('TELEGRAM_TOKEN')
        ]], new LaravelCache());

        $botman->hears('/start|start|mulai', function (BotMan $bot) {
                $message =
                    'Selamat datang!

Terima kasih telah menghubungi Bot ___(Sistem Informasi Perpajakan)___.
Ini adalah kanal layanan informasi perbendaharaan seputar perpajakan melalui Telegram yang akan melayani Bapak/Ibu selama 7x24 jam.

Untuk melanjutkan layanan ini secara penuh, harap segera melengkapi informasi Bapak/Ibu berikut ini.
';

                $bot->reply($message, [
                    'parse_mode' => 'Markdown'
                ]);
                // $bot->startConversation(new RegisterConversation());
        })->stopsConversation();

        $botman->hears('/kitab|kitab', function (BotMan $bot) {
            $bot->startConversation(new ExampleConversation());
        })->stopsConversation();

        $botman->hears('/lapor|lapor|laporkan', function (BotMan $bot) {
            $bot->reply('Silahkan laporkan di email mohwalid.jaeger@gmail.com . Laporan kamu akan sangat berharga buat kemajuan bot ini.');
        })->stopsConversation();

        $botman->hears('/tentang|about|tentang', function (BotMan $bot) {
            $bot->reply('Experiment bot hadits by Walid. https://walid.id.');
        })->stopsConversation();

        $botman->listen();
    }

    public function sendMessage(Request $request)
    {
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

        $botman = BotManFactory::create(["telegram" => [
            "token" => env('TELEGRAM_TOKEN')
        ]], new LaravelCache());

        $users = User::all();

        foreach ($users as $user) {
            $botman->say($request->message, $user->id_telegram, TelegramDriver::class);
        }

        return response()->json('sukses');
    }
}
