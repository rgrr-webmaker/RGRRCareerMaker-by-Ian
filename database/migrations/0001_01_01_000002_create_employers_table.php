<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('company_phone')->nullable();
            $table->text('company_address')->nullable();
            $table->string('industry')->nullable();
            $table->integer('company_size')->nullable();
            $table->text('company_description')->nullable();
            $table->string('logo_path')->nullable();
            $table->timestamps();

            $table->unique('user_id');
            $table->index('company_name');
            $table->index('industry');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
