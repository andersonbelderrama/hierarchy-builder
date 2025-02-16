<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamicField extends Model
{
      use SoftDeletes;

      protected $fillable = [
            'dynamic_structure_id',
            'dynamic_section_id',
            'related_structure_id',
            'label',
            'placeholder',
            'type',
            'required',
            'visible_in_list',
            'order_list',
            'order_section',
            'tooltip',
            'options',
      ];

      protected $casts = [
            'options' => 'array',
      ];

      public function structure()
      {
            return $this->belongsTo(DynamicStructure::class);
      }

      public function section()
      {
            return $this->belongsTo(DynamicSection::class);
      }

      public function relatedStructure()
      {
            return $this->belongsTo(DynamicStructure::class, 'related_structure_id');
      }
}
