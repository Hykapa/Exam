<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'user_id',
        'price'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(array('id', 'first_name', 'last_name'));
    }
}
