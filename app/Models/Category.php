<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_category';

    protected $primaryKey = 'cate_id';

    protected $fillable = [
        'user_id',
        'cate_name',
        'cate_img',
        'cate_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'view'
    ];

    // public function Cate(){
    //     return DB::table('tpl_category')->where('status',1)->get();
    // }

    public function Product(){
        return $this->HasMany('App\Models\Product','cate_id','cate_id')->withTrashed();
    }
    public function User(){
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function scopeQueryStatusOne($query){
        return $query->where('tpl_category.status', 1);
    }
}
