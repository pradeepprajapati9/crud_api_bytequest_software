<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addproduct extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'price',
        'offer',
        'important_note',
        'product_details',
        'file',
    ];
}
