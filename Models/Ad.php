<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'contractor_id',
        'title',
        'text',
        'from',
        'until',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'ad_tags')->select('name');
    }

    public function contractor()
    {
        return $this->belongsTo(User::class, 'contractor_id', 'id')->
        select(array('id', 'first_name', 'last_name'));
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(array('id', 'first_name', 'last_name'));
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
