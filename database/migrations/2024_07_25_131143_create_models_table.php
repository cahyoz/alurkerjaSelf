<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('bpmn');
            $table->timestamps();
            $table->foreignId('project_id')->constrained('projects');
        });
    }

    public function down()
    {
        Schema::dropIfExists('models');
    }
}
