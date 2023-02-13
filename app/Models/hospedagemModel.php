<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospedagemModel extends Model
{
    use HasFactory;

    protected $table = 'hospedagens';
    protected $primaryKey = 'id';

}
