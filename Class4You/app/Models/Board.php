<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $primaryKey = 'BoardID';

    protected $fillable = [
        'BoardCategoryID',
        'UserID',
        'BoardTitle',
        'BoardComment',
    ];

}
