<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id', 10)->nullable()->unique();
            $table->string('emp_fname')->nullable();
            $table->string('emp_midname')->nullable();
            $table->string('emp_surname')->nullable();
            $table->string('emp_mobile')->nullable()->unique();
            $table->string('emp_email')->nullable()->unique();
            $table->string('emp_gender')->nullable();
            $table->string('emp_blood_group')->nullable();
            $table->string('emp_dob')->nullable();
            $table->string('emp_adharcard')->nullable()->unique();
            $table->string('emp_pancard')->nullable()->unique();
            $table->string('emp_image')->nullable();
            $table->string('emp_emr_name_1')->nullable();
            $table->string('emp_emr_mobile_1')->nullable();
            $table->string('emp_emr_relationship_1')->nullable();
            $table->string('emp_emr_name_2')->nullable();
            $table->string('emp_emr_mobile_2')->nullable();
            $table->string('emp_emr_relationship_2')->nullable();
            $table->string('emp_address_line_1')->nullable();
            $table->string('emp_address_line_2')->nullable();
            $table->string('emp_country')->nullable();
            $table->string('emp_state')->nullable();
            $table->string('emp_city')->nullable();
            $table->string('emp_pincode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
