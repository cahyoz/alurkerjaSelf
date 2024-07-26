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
            $table->string('google_id')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->binary('profile_picture')->nullable();
            $table->string('whatsapp_number', 15)->notNullable();
            $table->timestamps();
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('position_id')->nullable()->constrained('positions');
            $table->foreignId('address_detail_id')->nullable()->constrained('address_detail');
            $table->string('role')->default('client'); // Menambahkan kolom role dengan default 'client'
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
