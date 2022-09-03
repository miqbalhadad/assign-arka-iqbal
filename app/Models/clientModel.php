<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientModel extends Model
{
    protected $table = 'tb_m_client';

    protected $fillable = [
        'client_name',
        'client_address',
        'created_at',
        'updated_at'
    ];
    
}
