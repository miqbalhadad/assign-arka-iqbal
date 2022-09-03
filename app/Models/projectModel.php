<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class projectModel extends Model
{
    protected $table = 'tb_m_project';

    protected $fillable = [
        'project_name',
        'client_id',
        'project_start',
        'project_end',
        'Project_status',
        'created_at',
        'updated_at'
    ];

    public function clients(){
        return $this->belongsTo(clientModel::class);
    }
}
