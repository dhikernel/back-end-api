<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctor')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')->references('id')->on('patient')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->timestamps();
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
        Schema::dropIfExists('doctor_patient');
    }
}
