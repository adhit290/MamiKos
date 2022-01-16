<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->bigIncrements('kost_id');
            $table->string('kost_name', 40);
            $table->string('location', 100);
            $table->string('facility', 100);
            $table->string('description', 300);
            $table->string('price', 100);
            $table->string('owner_name', 30);
            $table->string('contact', 20);
            $table->integer('kost_avaibility');
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
        Schema::dropIfExists('kosts');
    }
}
