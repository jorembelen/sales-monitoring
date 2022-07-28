<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'contact',
        'dob',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
        : static::query()
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->orWhere('address', 'like', '%'.$search.'%')
            ->orWhere('contact', 'like', '%'.$search.'%');
    }

}
