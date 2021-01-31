<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_title',
        'site_icon',
        'site_logo',
        'site_url',
        'site_email',
        'site_address',
        'site_mobile',
        'site_phone',
        'site_fax',
        'copy_right',
        'site_meta_description',
        'site_meta_keywords'
    ];


}
