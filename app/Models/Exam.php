<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'category_id',
        'time',
    ];

    public function category()
    {
        return $this->belongTo(Category::class);
    }

    public function questions()
    {
        return $this->belongToMany(Question::class);
    }
}
