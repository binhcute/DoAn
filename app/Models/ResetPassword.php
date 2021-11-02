<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'tpl_reset_password';
    
    protected $connection = 'mysql';
    
    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];

}
