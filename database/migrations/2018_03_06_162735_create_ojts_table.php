<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOjtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->char('m_i');
            $table->date('bday');
            $table->boolean('gender')->default(false);
            $table->string('address');
            $table->string('course');
            $table->string('school');
            $table->integer('no_hrs')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('endo')->nullable();
            $table->boolean('access_pass_app')->default(false)->nullable();
            $table->boolean('school_endorsement')->default(false)->nullable();
            $table->boolean('dole')->default(false)->nullable();
            $table->boolean('cv')->default(false)->nullable();
            $table->boolean('brgy_police')->default(false)->nullable();
            $table->boolean('pic2x2')->default(false)->nullable();
            $table->boolean('deploy')->default(false)->nullable();
            $table->date('orientation')->nullable();
            $table->boolean('requirements_list')->default(false)->nullable();
            $table->boolean('contract')->default(false)->nullable();
            $table->boolean('memo_endorsement')->default(false)->nullable();
            $table->boolean('endorsement_dept')->default(false)->nullable();
            $table->boolean('request_certificate')->default(false)->nullable();
            $table->boolean('certificate_completion')->default(false)->nullable();
            $table->boolean('evaluation')->default(false)->nullable();
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
        Schema::dropIfExists('ojts');
    }
}
