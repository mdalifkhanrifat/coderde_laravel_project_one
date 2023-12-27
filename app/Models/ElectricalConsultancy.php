<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectricalConsultancy extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'photo',
        'working_status',
        'seo_title',
        'seo_meta_description'
    ];

}
