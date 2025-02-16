<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicSection extends Model
{
      use SoftDeletes;

      protected $fillable = [
            'dynamic_structure_id',
            'title',
            'description',
            'order',
            'settings',
      ];

      protected $casts = [
            'settings' => 'array',
      ];

      public function structure()
      {
            return $this->belongsTo(DynamicStructure::class);
      }

      public function fields()
      {
            return $this->hasMany(DynamicField::class);
      }
}
