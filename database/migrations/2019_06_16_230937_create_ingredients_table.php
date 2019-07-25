<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('recipe_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('unity');
            $table->foreign('recipe_id')->references("id")->on("recipes");
            $table->foreign('product_id')->references("id")->on("products");






            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
