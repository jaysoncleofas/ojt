<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_code');
        });

        DB::table('departments')->insert([
          ['name' => 'Human Resource Department', 'name_code' => 'HRD'],
          ['name' => 'Airport Operations Managment Group', 'name_code' => 'AOMG'],
          ['name' => 'Aviation Security Department', 'name_code' => 'ASD'],
          ['name' => 'Corporate Planning', 'name_code' => 'CP'],
          ['name' => 'Pass Control Office', 'name_code' => 'PCO'],
          ['name' => 'Community Relations Department', 'name_code' => 'CRD'],
          ['name' => 'Accounting Department', 'name_code' => 'AD'],
          ['name' => 'Marketing Department', 'name_code' => 'MD'],
          ['name' => 'Records Managment Office', 'name_code' => 'RMO'],
          ['name' => 'Commercial & Business Development Group', 'name_code' => 'CBDG'],
          ['name' => 'Airport Control Center', 'name_code' => 'ACC'],
          ['name' => 'Safety and Environmental Management Office', 'name_code' => 'SEMO'],
          ['name' => 'Emergency Services Department', 'name_code' => 'ESD'],
          ['name' => 'Procurement Department', 'name_code' => 'PD'],
          ['name' => 'Airport Security Quality Control Office', 'name_code' => 'ASQCO'],
          ['name' => 'Legal Department', 'name_code' => 'LD'],
          ['name' => 'Quality Office & Records Department', 'name_code' => 'QORD'],
          ['name' => 'Property & General Services Department', 'name_code' => 'PGSD'],
          ['name' => 'BAC Secretariat Office', 'name_code' => 'BAC'],
          ['name' => 'Engineering & Maintenance Department', 'name_code' => 'EMD'],
          ['name' => 'Treasury Department', 'name_code' => 'TD'],
          ['name' => 'Corporate Communications Department', 'name_code' => 'CCD'],
          ['name' => 'MIS & GIS Department', 'name_code' => 'MISGISD']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
