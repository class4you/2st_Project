<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model
{
    use HasFactory;
    public function languageLink() {
        return $this->belongsTo(ClassLanguageLink::class, 'ClassLanguageID');
    }

    protected $table = 'class_infos';

    protected $fillable = [
        'ClassTitle',
        'ClassDescription',
        'ClassImg',
    ];
}
