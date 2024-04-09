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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('primary_mobile');
            $table->string('secondary_mobile')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('aadhaar_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('family_card')->nullable();
            $table->string('spouse')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('relation_with_nominee')->nullable();
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('employment_type')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->string('application_form')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
