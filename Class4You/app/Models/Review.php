<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function enrollment() {
        return $this->belongsTo(Enrollment::class, 'UserID');
    }

    protected $table = 'reviews';

    protected $primaryKey = 'ReviewID';

    // erd보고 확인해야함.
    protected $fillable = [
        'EnrollmentID',
        'ReviewComment',
        'ReviewRating',
    ];

    // 현재시간 변경
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}
