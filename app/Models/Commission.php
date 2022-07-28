<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'type',
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
        : static::query()
            ->where('amount', 'like', '%'.$search.'%')
            ->orWhere('type', 'like', '%'.$search.'%');
    }

}
