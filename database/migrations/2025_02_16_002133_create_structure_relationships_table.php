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
            Schema::create('structure_relationships', function (Blueprint $table) {
                  $table->id();
                  $table->foreignId('parent_structure_id')->constrained('dynamic_structures')->cascadeOnDelete();
                  $table->foreignId('child_structure_id')->constrained('dynamic_structures')->cascadeOnDelete();
                  $table->string('relationship_type')->comment('one_to_one, one_to_many, many_to_many', 'belongs_to', 'has_many');
                  $table->timestamps();

                  $table->unique(['parent_structure_id', 'child_structure_id']);
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
            Schema::dropIfExists('structure_relationships');
      }
};
