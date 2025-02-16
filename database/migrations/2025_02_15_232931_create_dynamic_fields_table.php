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
            Schema::create('dynamic_fields', function (Blueprint $table) {
                  $table->id();
                  $table->foreignIdFor(\App\Models\DynamicStructure::class)->constrained()->cascadeOnDelete();
                  $table->foreignIdFor(\App\Models\DynamicSection::class)->constrained()->cascadeOnDelete();
                  $table->foreignId('related_structure_id')->nullable()->constrained('dynamic_structures')->cascadeOnDelete();
                  $table->string('label');
                  $table->string('placeholder')->nullable();
                  $table->string('type');
                  $table->boolean('required')->default(false);
                  $table->boolean('visible_in_list')->default(false);
                  $table->integer('order_list')->default(0);
                  $table->integer('order_section')->default(0);
                  $table->string('tooltip')->nullable();
                  $table->json('options')->nullable();
                  $table->softDeletes();
                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
            Schema::dropIfExists('dynamic_fields');
      }
};
