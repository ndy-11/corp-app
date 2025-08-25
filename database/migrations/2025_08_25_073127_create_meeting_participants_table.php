<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('meeting_participants', function (Blueprint $table) {
            $table->foreignId('meeting_id')->constrained('meetings')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_required')->default(true);
            $table->enum('response', ['pending', 'accepted', 'declined'])->default('pending');
            $table->primary(['meeting_id', 'user_id']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('meeting_participants');
    }
};
