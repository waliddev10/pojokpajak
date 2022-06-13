<?php

namespace App\Conversations;

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question as BotManQuestion;
use BotMan\BotMan\Messages\Incoming\Answer as BotManAnswer;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class WelcomeConversation extends Conversation
{

    public function askKeperluan()
    {

        $this->ask(Question::create("Berikut adalah layanan yang saat ini tersedia di SiBENDI.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_keperluan')
            ->addButtons([
                Button::create('Informasi Perpajakan')->value('pajak'),
                Button::create('Informasi Gaji dan Tunjangan')->value('gaji')
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'pajak':
                        $this->askKeperluanPajak();
                        break;
                    case 'gaji':
                        $this->askKeperluanGaji();
                        break;
                    default:
                        break;
                }
            }
        });
    }

    public function askKeperluanPajak()
    {

        $this->ask(Question::create("Layanan Informasi Perpajakan")
            ->fallback('Unable to ask question')
            ->callbackId('ask_keperluan')
            ->addButtons([
                Button::create('Daftar Pemotongan PPh21 Nonfinal')->value('pajak'),
                Button::create('Bukti Pemotongan PPh21 Final')->value('gaji')
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    default:
                        $this->say('Menu belum tersedia');
                        break;
                }
            }
        });
    }

    public function askKeperluanGaji()
    {

        $bulan_tahun = Carbon::now()->format('F Y');

        $this->ask(Question::create("Layanan Informasi Gaji dan Tunjangan")
            ->fallback('Unable to ask question')
            ->callbackId('ask_keperluan')
            ->addButtons([
                Button::create('Slip Gaji ' . $bulan_tahun)->value('pajak'),
                Button::create('Slip Gaji Tahun Ini')->value('pajak')
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    default:
                        $this->say('Menu belum tersedia');
                        break;
                }
            }
        });
    }

    public function run()
    {
        $this->askKeperluan();
    }
}
