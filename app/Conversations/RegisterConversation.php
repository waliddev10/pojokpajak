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
use Ramsey\Uuid\Uuid;

class RegisterConversation extends Conversation
{
    protected $jenisKelamin = '';
    protected $sapaan = '';

    protected $namaLengkap = '';
    protected $statusPegawai = '';
    protected $namaStatusPegawai = '';

    protected $nipPNS = '';

    public function askJenisKelamin()
    {

        $this->ask(Question::create("Sebelum memulai, mohon izin konfirmasi jenis kelamin Bapak/Ibu.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_jenisKelamin')
            ->addButtons([
                Button::create('Laki-laki')->value('Laki-laki'),
                Button::create('Perempuan')->value('Perempuan')
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->jenisKelamin = $answer->getValue();
                if ($this->jenisKelamin == 'Laki-laki') {
                    $this->sapaan = 'Bapak';
                } else {
                    $this->sapaan = 'Ibu';
                }
                $this->say('Baik, terima kasih ' . $this->sapaan . '.', ['parse_mode' => 'Markdown']);
                $this->askNamaLengkap();
            }
        });
    }

    public function askNamaLengkap()
    {
        $this->ask('Silakan isi Nama Lengkap sesuai KTP ' . $this->sapaan . '.', function (Answer $answer) {
            $this->namaLengkap = strtoupper($answer->getText());
            $this->say('Baik.');
            $this->askStatusPegawai();
        });
    }

    public function askStatusPegawai()
    {

        $this->ask(Question::create("Selanjutnya, silahkan pilih status kepegawaian/relasi " . $this->sapaan . '.')
            ->fallback('Unable to ask question')
            ->callbackId('ask_statusPegawai')
            ->addButtons([
                Button::create('Pegawai Negeri Sipil')->value('pns'),
                Button::create('Pegawai Pemerintah Non Pegawai Negeri')->value('ppnpn'),
                Button::create('Rekanan Bendahara')->value('rekanan'),
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'pns':
                        $this->statusPegawai = 'pns';
                        $this->namaStatusPegawai = 'Pegawai Negeri Sipil';
                        $this->say($this->sapaan . ' telah memilih ***' . $this->namaStatusPegawai . '***', ['parse_mode' => 'Markdown']);
                        $this->askNipPNS();
                        break;
                    case 'ppnpn':
                        $this->statusPegawai = 'ppnpn';
                        $this->namaStatusPegawai = 'Pegawai Pemerintah Non Pegawai Negeri';
                        // $this->jawabanNya('HR. Bukhari');
                        break;
                    case 'rekanan':
                        $this->statusPegawai = 'rekanan';
                        $this->namaStatusPegawai = 'Rekanan Bendahara';
                        // $this->jawabanNya('HR. Ibnu Majah');
                        break;
                    default:
                        # code...
                        break;
                }
            }
        });
    }

    public function askNipPNS()
    {
        $this->ask('Silakan isi No. Induk Pegawai (NIP) PNS ' . $this->sapaan . '.', function (Answer $answer) {
            $this->nipPNS = $answer->getText();
            $this->say('Baik.');
            $this->say('Berikut biodata sesuai dengan yang ' . $this->sapaan . ' isikan:
            
Nama Lengkap   : ' . $this->namaLengkap . '
Jenis Kelamin  : ' . $this->jenisKelamin . '
Status     : ' . $this->namaStatusPegawai . '
NIP        : ***' . $this->nipPNS . '***
            ', ['parse_mode' => 'Markdown']);
            $this->askKonfirmasi();
        });
    }

    public function askKonfirmasi()
    {
        $this->ask(Question::create("Terakhir, apakah data tersebut sudah benar? (4 dari 4 langkah)")
            ->fallback('Unable to ask question')
            ->callbackId('ask_konfirmasi')
            ->addButtons([
                Button::create('Iya')->value('Iya'),
                Button::create('Tidak')->value('Tidak')
            ]), function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'Iya':
                        $this->say($this->sapaan . ' telah memilih ***' . $answer->getValue() . '***', ['parse_mode' => 'Markdown']);

                        $dataTelegram = $this->bot->getUser();

                        $user = User::create([
                            'id' => Uuid::uuid4(),
                            'telegram_id' => $dataTelegram->getId(),
                            'nama' => $this->namaLengkap,
                            'nip' => $this->nipPNS,
                            'jenis_kelamin' => $this->jenisKelamin,
                            'status' => $this->statusPegawai
                        ]);

                        if ($user) {
                            $this->say('Selamat, informasi ' . $this->sapaan . ' telah berhasil disimpan oleh SiBENDI!', ['parse_mode' => 'Markdown']);
                        } else {
                            $this->say('Mohon maaf terjadi kegagalan sistem, informasi ' . $this->sapaan . ' tidak dapat disimpan oleh SiBENDI. Silakan coba lagi atau hubungi admin SiBENDI.', ['parse_mode' => 'Markdown']);
                        }



                        break;
                    case 'Tidak':
                        $this->say('Baik. Mohon maaf sebelumnya, izin untuk mengulang formulir data ' . $this->sapaan . '.');
                        $this->askNamaLengkap();
                        break;
                    default:
                        # code...
                        break;
                }
            }
        });
    }

    public function run()
    {
        $this->askJenisKelamin();
    }
}
