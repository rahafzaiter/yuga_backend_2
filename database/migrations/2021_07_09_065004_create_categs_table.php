<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable;
            $table->decimal('price');
            $table->timestamps();
        });

        // Schema::create('products', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('category_id');
        //     $table->string('title');
        //     $table->string('description');
        //     $table->string('color');
        //     $table->string('collection');
        //     $table->integer('price');       
        //     $table->integer('S');    
        //     $table->integer('M');  
        //     $table->integer('L');         
        //     $table->integer('XL');    
        //     $table->integer('XXL');                           
        //     $table->timestamps();
        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        // });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categs');
    }
}
