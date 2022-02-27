<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;


class Job extends Model
{
    use HasFactory;
     protected $fillable = [
        'position',
        'institute_name',
        'institute_logo',
        'institute_banner',
        // 'job_cat',
        'category_id',
        'vacancy',
        'apply_start_at',
        'apply_end_at',
        'apply_fee',
        'salary',
        'circular',
        'apply_url',
        'requirements',
        'job_status',
    ];

    public function category(){
      return $this->belongsTo(Category::class);
    }
}
