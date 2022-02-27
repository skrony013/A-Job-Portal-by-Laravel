<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Job;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'cat_title',
        'cat_img',
        'cat_icon',
        'cat_desc',
    ];
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
