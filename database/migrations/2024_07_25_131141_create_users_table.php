<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id');
            $table->string('google_token');
            $table->string('google_refresh_token')->nullable();
            $table->binary('profile_picture')->nullable();
            $table->string('whatsapp_number', 15)->nullable();
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('position_id')->nullable()->constrained('positions');
            $table->foreignId('address_detail_id')->nullable()->constrained('address_detail');
            $table->string('role')->default('client'); // Menambahkan kolom role dengan default 'client'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
