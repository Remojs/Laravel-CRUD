<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->string("occupationName");
            $table->string("status");
            $table->string("leader");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('occupations');
    }
};
