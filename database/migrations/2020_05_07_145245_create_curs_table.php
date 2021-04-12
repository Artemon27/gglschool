<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('full_decription')->nullable();
            $table->string('program')->nullable();
            $table->string('description')->nullable();
            $table->string('id_image')->nullable();
            $table->integer('persons')->nullable();
            $table->integer('time')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('curs');
    }
}
