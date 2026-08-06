<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('institution')->nullable();
            $table->string('city')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('need_type');
            $table->text('message');
            $table->string('status')->default('new');
            $table->string('locale', 2)->default('fr');
            $table->timestamp('processed_at')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_requests');
    }
};
