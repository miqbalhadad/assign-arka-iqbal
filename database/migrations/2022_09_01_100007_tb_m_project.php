<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabel project
        Schema::create('tb_m_project', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('project_name', 100);
            $table->foreignId('client_id');
            $table->date('project_start');
            $table->date('project_end');
            $table->char('Project_status', 15);
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
};
