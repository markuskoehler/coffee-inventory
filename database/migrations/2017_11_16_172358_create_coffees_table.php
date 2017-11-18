<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoffeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('sort');
            $table->boolean('limited_edition');
            $table->integer('quantity');
            $table->enum('type', ['beans', 'capsules', 'instant', 'pads']);
            $table->unsignedInteger('machine_id');
            $table->unsignedInteger('image_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('coffees', function (Blueprint $table) {
            $table->foreign('machine_id')
                ->references('id')
                ->on('machines');

            $table->foreign('image_id')
                ->references('id')
                ->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffees');
    }
}
