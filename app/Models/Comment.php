<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_comment';

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'article_id',
        'rate',
        'role',
        'comment_description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','product_id')->withTrashed();
    }
    public function article(){
        return $this->belongsTo('App\Models\Article','article_id','article_id')->withTrashed();
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }

    // Danh sách bình luận
    public function scopeQueryStatusBinhLuan($query, $id_product){
        $query  ->select(
                    'tpl_comment.comment_description',
                    'tpl_comment.rate',
                    'tpl_comment.updated_at',
                    'users.avatar',
                    'users.firstName',
                    'users.lastName'
                )
                ->join('users', 'users.id', '=', 'tpl_comment.user_id')
                ->where('tpl_comment.status', 1)
                ->where('tpl_comment.product_id', $id_product);
        return $query;
    }
}
