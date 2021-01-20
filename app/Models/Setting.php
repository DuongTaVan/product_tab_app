<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['shopify_domain', 'status', 'font_site', 'background', 'max_column', 'color', 'font_family', 'background_title', 'color_title','type'];
}
