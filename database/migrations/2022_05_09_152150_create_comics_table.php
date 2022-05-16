<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->nullable(false);
            $table->text('description')->nullable();
            $table->string('thumb', 500)->nullable();
            $table->integer('price')->nullable();
            $table->string('series', 200)->nullable(false);
            $table->date('sale_date', 20)->nullable();
            $table->string('type', 50)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}