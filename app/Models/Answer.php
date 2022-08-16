<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'question_id',
        'correct',
    ];

    public function question()
    {
        return $this->belongTo(Question::class);
    }
}
