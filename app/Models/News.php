<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $primarykey = 'id';


    protected $fillable = [
        'title',
        'text',
        'img',
        'cat_id'
    ];
}
