<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory;

    protected $primaryKey = 'ChapterID';

    protected $fillable = [
        'ChapterID',
        'ClassID',
        'ChapterTitle',
        'ChapterFlg',
        'updated_at',
    ];
}
