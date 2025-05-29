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
        Schema::create('track_doc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('letter_id')->constrained('letters')->onDelete('cascade');
            $table->foreignId('user_id_to')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id_to')->constrained('departments')->onDelete('cascade');
            $table->foreignId('user_id_from')->constrained('users')->onDelete('cascade');
            $table->foreignId('department_id_from')->constrained('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track_doc');
    }
};
