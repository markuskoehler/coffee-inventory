<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->enum('type', ['beans', 'capsules', 'instant', 'pads']);
            $table->date('bought_at')->nullable();
            $table->unsignedInteger('location_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('machines', function (Blueprint $table) {
            $table->foreign('location_id')
                ->references('id')
                ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
