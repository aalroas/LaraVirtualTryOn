<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'qty',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
