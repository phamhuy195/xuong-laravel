<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'is_active',
    ];

//    Tự động chuyển đổi ép kiểu dữ liệu
    protected $casts =[
        'is_active'=> 'boolean',
    ];
}
