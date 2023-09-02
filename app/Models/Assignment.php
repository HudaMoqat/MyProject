<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'assignments';

    protected $fillable = ['title','due_date','details','course_id'];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public static array $Store_rules =[
        'title'=>'required',
        'date' => 'required',
        'detail'=>'required',
        'course_id'=>'required',
    ];

    public static array $update_rules =[
        'title'=>'required',
        'date' => 'required',
        'detail'=>'required',
        'course_id'=>'required',
    ];
}
