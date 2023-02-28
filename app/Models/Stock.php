<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // fillable list
    protected $fillable = [
        'name',
        'amount',
        'quantity',
        'arrival_date',
        'unit_id'
    ];

    // relation
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // // cast
    // protected $casts = [
    //     'amount' => 'integer',
    //     'quantity' => 'integer'
    // ];
}
