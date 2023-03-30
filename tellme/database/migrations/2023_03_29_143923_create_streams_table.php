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
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->text('url')->nullable(false);
            $table->string('duration');
            $table->string('cover');
            $table->foreignId("user_id")
                ->constrained("users")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('is_saved')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streams');
    }
};
