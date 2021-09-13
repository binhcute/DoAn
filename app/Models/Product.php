<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_product';

    protected $primaryKey = 'product_id';

    protected $connection = 'mysql';
    
    
    protected $fillable =[
        'cate_id',
        'user_id',
        'port_id',
        'product_name',
        'product_img',
        'product_img_hover',
        'product_price',
        'product_color',
        'product_description',
        'product_quantity',
        'product_keyword',
        'status',
        'created_at',
        'updated_at',
        'view',
        'deleted_at'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'cate_id', 'cate_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function portfolio(){
        return $this->belongsTo('App\Models\Portfolio', 'port_id','port_id');
    }
    public function orderDetail(){
        return $this->HasMany('App\Models\OrderDetail','product_id','product_id');
    }
    public function scopeQueryStatusOne($query){
        return $query->where('tpl_product.status', 1);
    }

    public function scopeQueryJoinCateAndPort($query){
        return $query->join('tpl_category','tpl_category.cate_id','tpl_product.cate_id')
        ->join('tpl_portfolio', 'tpl_portfolio.port_id','tpl_product.port_id');
    }
}

