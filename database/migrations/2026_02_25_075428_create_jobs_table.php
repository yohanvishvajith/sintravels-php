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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->string('country');
            $table->integer('salary_min');
            $table->integer('salary_max')->nullable();
            $table->integer('vacancies')->default(1);
            $table->integer('age_min');
            $table->integer('age_max');
            $table->string('gender')->nullable();
            $table->string('holidays')->default('sunday');
            $table->string('currency');
            $table->string('type');
            $table->string('work_time')->nullable();
            $table->string('industry')->nullable();
            $table->string('experience')->nullable();
            $table->string('visa_category')->nullable();
            $table->string('contract_period')->nullable();
            $table->text('description');
            $table->json('requirements');
            $table->integer('applicants_count')->default(0);
            $table->dateTime('closing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
