<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_article';
    //Khóa chính tự động tăng int
    protected $primaryKey = 'article_id';

    //Kết nối CSDL
    protected $connection = 'mysql';
    
    protected $fillable = [
        'user_id',
        'article_name',
        'article_img',
        'article_detail',
        'article_description',
        'article_keyword',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'view'
    ];

    public function User(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function scopeQueryStatusOne($query){
        return $query->where('tpl_article.status', 1);
    }
}
