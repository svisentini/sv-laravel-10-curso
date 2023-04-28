<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    /*
    Não é obrigatorio quando a tabela tem o mesmo nome do Model, porem no plural
    */
    protected $table = 'supports';
}
