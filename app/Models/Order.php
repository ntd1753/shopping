<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ="orders";

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'total',
        'discount',
        'total_amount',
        'status'
    ];
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id','id');
    }

    public function oderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

}
