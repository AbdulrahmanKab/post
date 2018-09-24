<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPosttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post',function (Blueprint $table){
            $table->increments('id');
            $table->string('commentstatus',50);
            $table->string('posttitle',50);
            $table->string('isdelete',50)->default(0);
            $table->string('keyword',50);
            $table->string('image',100)->nullabel();
            $table->string('addby',50)->nullabel();
            $table->string('content',500);
            $table->integer('department_id');
            $table->string('reputation',50)->nullabel();
            $table->string('poststatus',50)->nullabel();
            $table->string('disable','20')->default('0');
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
        //
    }
}
