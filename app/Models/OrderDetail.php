<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'tpl_order_dt';

    protected $primaryKey = 'order_dt_id';
    
    protected $connection = 'mysql';
    
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price',
        'amount'
    ];

    public function order(){
        return $this->belongsTo('App\Models\Order','order_id','order_id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','user_id','id');
    }
}
