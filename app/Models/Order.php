<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_order';

    protected $primaryKey = 'order_id';

    protected $connection = 'mysql';

    protected $fillable = [
        'user_id',
        'status',
        'note',
        'address',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function orderDetail()
    {
        return $this->HasMany('App\Models\OrderDetail', 'order_id', 'order_id');
    }

    public function scopeQueryDSDonHangMoi($query, $req)
    {
        return $query->select(
            'tpl_order.order_id',
            'tpl_order.updated_at',
            'tpl_order.status',
            'users.username',
            'users.email',
            'tpl_order.note'
        )
            ->where('tpl_order.status', $req)
            ->join('users', 'users.id', '=', 'tpl_order.user_id')
            ->orderBy('tpl_order.order_id', 'desc');
    }

    
}
