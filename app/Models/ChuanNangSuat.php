<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuanNangSuat extends Model
{
    use HasFactory;
    protected $fillable = [
        'thang',
        'nangsuat',
    ];
}
