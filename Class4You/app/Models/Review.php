<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class, 'UserID');
    }
    public function enrollment() {
        return $this->belongsTo(Enrollment::class, 'UserID');
    }

    protected $table = 'reviews';

    protected $fillable = [
        'ReviewID',
        'UserID',
        'ReviewContent',
        'ReviewRating',
    ];
}
