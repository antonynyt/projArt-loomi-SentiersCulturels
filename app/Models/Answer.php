<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'answer',
        'is_correct',
        'question_id',
    ];

    /**
     * Get the questions associated with the answer.
     */
    public function questions() {
        return $this->belongsTo(Question::class);
    }
}
