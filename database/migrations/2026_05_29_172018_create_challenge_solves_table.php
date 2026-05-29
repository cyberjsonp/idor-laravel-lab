<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('challenge_solves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('challenge_key'); // e.g. CH01
            $table->timestamp('solved_at');
            $table->unique(['user_id', 'challenge_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenge_solves');
    }
};
