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
        Schema::create('debit_cards', function (Blueprint $table) {
            $table->id();
            $table->string('arg_id');
            $table->string('arg_fname')->nullable();
            $table->string('arg_midname')->nullable();
            $table->string('arg_surname')->nullable();
            $table->string('arg_email')->nullable();
            $table->string('arg_mobile')->nullable();
            $table->string('arg_dob')->nullable();
            $table->string('arg_ifsc')->nullable();
            $table->string('arg_bank')->nullable();
            $table->string('arg_branch')->nullable();
            $table->string('arg_account')->nullable();
            $table->string('arg_confirm_account')->nullable();
            $table->string('arg_account_type')->nullable();
            $table->string('arg_card_type')->nullable();
            $table->string('arg_service_type')->nullable();
            $table->string('arg_document')->nullable();
            $table->string('arg_address_line_1')->nullable();
            $table->string('arg_address_line_2')->nullable();
            $table->string('arg_country')->nullable();
            $table->string('arg_state')->nullable();
            $table->string('arg_city')->nullable();
            $table->string('arg_pincode')->nullable();
            $table->string('arg_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit_cards');
    }
};
