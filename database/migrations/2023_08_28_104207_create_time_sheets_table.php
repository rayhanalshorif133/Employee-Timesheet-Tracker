<?php

use App\Models\TimeSheet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->string('hours_worked');
            $table->text('description_of_work');
            $table->string('status')->enum('submitted', 'approved', 'rejected');
            $table->timestamps();
        });

        TimeSheet::create([
            'employee_id' => 1,
            'project_id' => 1,
            'date' => '2021-08-28',
            'hours_worked' => '8',
            'description_of_work' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'status' => 'submitted',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_sheets');
    }
}
