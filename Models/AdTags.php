<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdTags extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ad_id',
        'tag_id',
    ];
}
