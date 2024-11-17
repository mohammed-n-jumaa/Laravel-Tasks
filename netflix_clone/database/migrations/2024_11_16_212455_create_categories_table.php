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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // المعرف الأساسي
            $table->string('name')->unique(); // عمود الاسم ويجب أن يكون فريدًا
            $table->string('description')->nullable(); // وصف الفئة (اختياري)
            $table->timestamps(); // أعمدة الوقت (created_at و updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
