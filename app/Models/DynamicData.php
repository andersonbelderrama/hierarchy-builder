<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicData extends Model
{
      use SoftDeletes;

      protected $fillable = [
            'structure_id',
            'code',
            'data',
      ];

      protected $casts = [
            'data' => 'array'
      ];

      public function structure()
      {
            return $this->belongsTo(DynamicStructure::class);
      }
}
