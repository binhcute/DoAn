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
    public function scopeQueryChiTiet($query, $req)
    {
        return $query->select(
            'tpl_product.product_img',
            'tpl_product.product_name',
            'tpl_order.*',
            'tpl_order_dt.*'
        )
            ->where('tpl_order.status', $req)
            ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
            ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id');
    }
}
