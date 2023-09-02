<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [];

    public function users() {
        return $this->belongsToMany(User::class,'course_user','course_id','user_id')
            ->using(CourseUser::class)->withTimestamps();
    }

    public function assignments() {
        return $this->hasMany(Assignment::class,);
    }
    public static array $Store_rules =[
        'name'=>'required',
    ];

    public static array $update_rules =[
        'name'=>'required',
    ];
}
