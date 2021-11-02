<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThongBao extends Model
{
    use SoftDeletes;

    protected $table = 'tpl_thong_bao';

    protected $primaryKey = 'noti_id';

    protected $connection = 'mysql';
    
    
    protected $fillable =[
        'noi_dung',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
