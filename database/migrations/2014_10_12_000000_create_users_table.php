<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable()->comment('First name and last name of the user');
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('otp')->nullable()->comment('OTP for phone verification');
            $table->string('verification_status')->enum('pending','progress', 'verified')->default('pending');
            $table->string('nationality')->nullable();
            $table->string('issuing_country')->nullable();
            $table->string('document_type')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('id_expiry_date')->nullable();
            $table->string('image')->nullable();
            $table->string('nid_image_font')->nullable();
            $table->string('nid_image_back')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
