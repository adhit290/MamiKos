<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartemens', function (Blueprint $table) {
            $table->bigIncrements('apartemen_id');
            $table->string('apartemen_name', 40);
            $table->string('location', 100);
            $table->string('facility', 100);
            $table->string('description', 300);
            $table->string('price', 100);
            $table->string('owner_name', 30);
            $table->string('contact', 20);
            $table->integer('apartemen_avaibility');
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
        Schema::dropIfExists('apartemens');
    }
}
