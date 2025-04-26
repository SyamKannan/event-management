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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->time('time');
            $table->enum('event_type', ['Meeting', 'Celebration', 'Seminar']);
            $table->foreignId('event_for_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('event_guidelines')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
