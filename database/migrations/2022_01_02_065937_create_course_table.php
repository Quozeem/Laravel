<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        //Schema::create('courseregister', function (Blueprint $table) {
           // $table->id();
           // $table->timestamps();
           //$table->string('second_resusult_text');
          // $table->string('second_resusult_exam');
          // $table->string('second_resusult_total');
         //  $table->string('third_resusult_text');
         //  $table->string('third_resusult_exam');
          // $table->string('third_resusult_total');

       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
