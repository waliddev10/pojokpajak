<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->string('npwp')->unique();
        // $table->string('nama');
        // $table->string('password');
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('email')->nullable();
        // $table->string('no_whatsapp')->nullable();
        // $table->string('id_telegram')->nullable();
        // $table->enum('jenis_wp', ['Orang Pribadi', 'Badan'])->default('Orang Pribadi');
        // $table->enum('role', ['admin', 'user']);

        return User::create([
            'id' => Uuid::uuid4(),
            'npwp' => '435126313627000',
            'nama' => 'Moh. Walid Arkham Sani',
            'password' => Hash::make('@dmin'),
            'email_verified_at' => Carbon::now()->format('Y-m-d'),
            'email' => 'admin@gmail.com',
            'no_whatsapp' => '085157626557',
            'id_telegram' => '761858009',
            'jenis_wp' => 'Orang Pribadi',
            'role' => 'admin',
            'notif_email' => true,
            'notif_telegram' => true,
            'notif_whatsapp' => true,
        ]);
    }
}
