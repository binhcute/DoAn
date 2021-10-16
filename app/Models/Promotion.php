<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $primaryKey = 'promotion_id';

    protected $table = 'tpl_promotion';

    protected $connection = 'mysql';

    protected $fillable = [
        'promotion_id', 
        'promotion_name',
        'promotion_percent',
        'promotion_money',
        'created_at',
        'updated_at',
        'end_at'
    ];
}
