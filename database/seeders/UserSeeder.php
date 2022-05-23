<?php

namespace Database\Seeders;

use App\Models\User;
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
        // $table->string('id', 36)->primary();
        // $table->string('nama');
        // $table->string('email')->unique();
        // $table->string('npwp')->unique();
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');
        // $table->enum('role', ['admin', 'user']);
        // $table->rememberToken();
        // $table->timestamps();
        return User::create([
            'id' => Uuid::uuid4(),
            'nama' => 'Moh. Walid Arkham Sani',
            'email' => 'admin@gmail.com',
            'npwp' => '435126313627000',
            'password' => Hash::make('@dmin'),
            'role' => 'admin'
        ]);
    }
}
