<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('npwp')->unique();
            $table->string('nama');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->nullable();
            $table->string('no_whatsapp')->nullable();
            $table->string('id_telegram')->nullable();
            $table->enum('jenis_wp', ['Orang Pribadi', 'Badan'])->default('Orang Pribadi');
            $table->enum('role', ['admin', 'user']);
            $table->boolean('notif_email')->default(false);
            $table->boolean('notif_telegram')->default(false);
            $table->boolean('notif_whatsapp')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
