<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;
    protected $fillable = [
        'nbrPersons',
        'shape',
        'tastes',
        'vegan',
        'decoration',
        'specificities',
        'status',
        'DeliveryDate',
        'isForDelivery',
        'client_name',
        'client_phone',
        'client_email',
        'price',
        'advance_payment'
    ];
}
