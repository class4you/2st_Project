<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function board() {
        return $this->belongsTo(Board::class, 'BoardID');
    }

    protected $table = 'reports';

    protected $primaryKey = 'ReportID';

    protected $fillable = [
        'ReportID',
        'UserID',
        'BoardID',
        'CommentID',
        'ReportContent',
        'ReportState',
    ];
}
