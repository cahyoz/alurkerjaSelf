<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('address_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->text('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('address_detail');
    }
}
