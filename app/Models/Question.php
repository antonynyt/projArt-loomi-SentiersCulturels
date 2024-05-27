<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'quiz_id',
    ];

    /**
     * Get the quizzes associated with the question.
     */
    public function quizzes() {
        return $this->belongsTo(Quiz::class);
    }
}
