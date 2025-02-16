<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicStructure extends Model
{
      use SoftDeletes;

      protected $fillable = [
            'title',
            'description',
            'prefix',
            'settings',
      ];

      protected $casts = [
            'settings' => 'array',
      ];

      public function sections()
      {
            return $this->hasMany(DynamicSection::class);
      }

      public function data()
      {
            return $this->hasMany(DynamicData::class);
      }

      public function parentRelationships()
      {
            return $this->hasMany(StructureRelationship::class, 'parent_structure_id');
      }

      public function childRelationships()
      {
            return $this->hasMany(StructureRelationship::class, 'child_structure_id');
      }
}
