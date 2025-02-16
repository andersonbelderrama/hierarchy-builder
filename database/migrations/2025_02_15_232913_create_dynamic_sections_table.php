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
            Schema::create('dynamic_sections', function (Blueprint $table) {
                  $table->id();
                  $table->foreignIdFor(\App\Models\DynamicStructure::class)->constrained()->cascadeOnDelete();
                  $table->string('title');
                  $table->string('description')->nullable();
                  $table->integer('order')->default(0);
                  $table->json('settings');
                  $table->softDeletes();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
            Schema::dropIfExists('dynamic_sections');
      }
};
