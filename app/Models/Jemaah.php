<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaah extends Model
{
    use HasFactory;

    protected $table = 'jemaahs';
    protected $guarded = ['id_jemaah'];
    protected $primaryKey = 'id_jemaah';
    
}
