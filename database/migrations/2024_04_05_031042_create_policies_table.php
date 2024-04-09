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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('bonus')->nullable();
            $table->decimal('penalty_ps')->nullable();
            $table->decimal('penalty_nps')->nullable();
            $table->integer('penalty_days_limit')->nullable();
            $table->integer('bonus_days_limit')->nullable();
            $table->decimal('company_commission')->nullable();
            $table->decimal('agent_commission')->nullable();
            $table->decimal('subscriber_commission')->nullable();
            $table->decimal('employee_commission')->nullable();
            $table->decimal('enrollment_fees')->nullable();
            $table->decimal('document_charges')->nullable();
            $table->integer('no_of_full_due_month')->nullable();
            $table->decimal('tds_with_pan')->nullable();
            $table->decimal('tds_without_pan')->nullable();
            $table->decimal('gst')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
