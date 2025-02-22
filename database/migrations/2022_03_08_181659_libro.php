<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('autor_id');
            $table->string('lote');
            $table->text('description');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
