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
            Schema::create('dynamic_data', function (Blueprint $table) {
                  $table->id();
                  $table->foreignIdFor(\App\Models\DynamicStructure::class)->constrained()->cascadeOnDelete();
                  $table->string('code');
                  $table->json('data');
                  $table->softDeletes();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
            Schema::dropIfExists('dynamic_data');
      }
};
