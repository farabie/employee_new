<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rembuisement', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 50)->nullable();
            $table->string('formula', 5)->nullable();
            $table->date('end_year')->nullable();
            $table->string('execute_by', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rembuisement');
    }
};
