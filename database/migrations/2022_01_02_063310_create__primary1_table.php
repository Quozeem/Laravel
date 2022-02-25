<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimary1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('primary1', function (Blueprint $table) {
            $table->id();
            $table->string('Student_name');
            $table->string('RegNo');
            $table->string('firstfee_payment');
            $table->string('firstfee_total');
            $table->string('secondfee_payment');
            $table->string('secondfee_total');
            $table->string('thirdfee_payment');
            $table->string('thirdfee_total');
            $table->string('firsthostel_payment');
            $table->string('firsthostel_total');
            $table->string('secondhostel_payment');
            $table->string('secondhostel_total');
            $table->string('thirdhostel_payment');
            $table->string('thirdhostel_total');

            //$table->timestamps();
        });  */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_primary1');
    }
}
