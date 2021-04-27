<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trip';
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trip_name', 'trip_type', 'status', 'trip_status', 'booking_cost', 'commission_cost', 'trip_date', 'booking_date',
    ];
}