<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->foreignId('organizer_id')->constrained('users');
            $table->string('location')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'canceled'])->default('scheduled');
            $table->softDeletes();
            $table->boolean('reminder_sent');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
