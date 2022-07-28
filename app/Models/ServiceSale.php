<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'service_id',
        'client_id',
        'date',
        'amount',
        'commission',
        'mode_of_payment',
        'processed_by'
    ];

}
