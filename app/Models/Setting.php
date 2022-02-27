<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
      protected $fillable = [
        'site_name',
        'site_tagline',
        'site_desc',
        'site_logo',
        'footer_logo',
        'site_favicon',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'address',
        'email',
        'phone',
    ];
}
