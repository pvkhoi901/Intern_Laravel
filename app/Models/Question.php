<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'content',
        'category_id',
    ];

    public function category()
    {
        return $this->belongTo(Category::class);
    }

    public function exams()
    {
        return $this->belongToMany(Exam::class);
    }
}
