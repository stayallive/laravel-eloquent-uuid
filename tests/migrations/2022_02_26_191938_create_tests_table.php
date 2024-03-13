<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tests', static function (Blueprint $table) {
            $table->uuid('id')->nullable();

            $table->uuid('other_id')->nullable();

            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
