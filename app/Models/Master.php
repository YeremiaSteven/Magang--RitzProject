<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_item';

    protected $fillable = [
        'vname_item',
        'id_category',
        'vbarcode',
        'vdescription',
        'istock',
        'iprice',
    ];

}
