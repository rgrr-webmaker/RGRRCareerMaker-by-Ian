<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('university')->nullable();
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->year('graduation_year')->nullable();
            $table->decimal('gpa', 3, 2)->nullable();
            $table->text('skills')->nullable();
            $table->text('bio')->nullable();
            $table->string('resume_path')->nullable();
            $table->timestamps();

            $table->unique('user_id');
            $table->index('university');
            $table->index('graduation_year');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
