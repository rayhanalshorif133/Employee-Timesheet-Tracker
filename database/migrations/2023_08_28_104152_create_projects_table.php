<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Project::create([
            'name' => 'Project 1',
            'start_date' => '2023-08-28',
            'end_date' => '2023-09-08',
        ]);

        Project::create([
            'name' => 'Project 2',
            'start_date' => '2023-09-08',
            'end_date' => '2023-09-18',
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
