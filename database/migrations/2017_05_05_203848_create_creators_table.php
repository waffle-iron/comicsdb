<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->string('firstname',100)->nullable();
            $table->string('lastname', 150);
            $table->enum('gender', ['male', 'female']);
            $table->datetime('birthdate')->nullable();
            $table->datetime('deathdate')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('twitter', 150)->nullable();
            $table->string('website')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creators');
    }
}
