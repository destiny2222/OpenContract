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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body')->nullable();
            $table->string('value')->nullable();
            $table->string('email')->nullable();
            $table->date('award_date')->nullable();
            $table->boolean('award')->default(false);
            $table->string('location')->nullable();
            $table->integer('contract_amount')->default(0);
            $table->integer('tender_amount')->default(0);
            $table->integer('budget_amount')->default(0);
            $table->string('company_name')->nullable();
            $table->string('contructor_name')->nullable();
            $table->string('contructor_origin')->nullable();
            $table->string('category')->nullable();
            $table->string('year')->nullable();
            $table->string('procuring_entity')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('active')->default(false);
            $table->foreignId('contractor_id')->constrained('contractors')->onDelete('CASCADE')->onUpdate('CASCADE'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
