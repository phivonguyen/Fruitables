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
        Schema::create('hero_tables', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->mediumText('description')->nullable();
            $table->tinyInteger('status')->default('0')->comment('Visible = 1; Hidden = 0');
            $table->string('href')->default('#');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_tables');
    }
};
