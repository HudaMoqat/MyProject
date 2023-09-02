<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name','email','password','is_teacher'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses() {
        return $this->belongsToMany(Course::class)
            ->using(CourseUser::class)->withTimestamps();
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function assignments(){
        return $this->hasManyThrough(Assignment::class,CourseUser::class,
            'user_id',//in pivot table
            'course_id',//in assignment table
            'id',//local key or primary key in user table
            'course_id');// in pivot table
    }

    public static array $Store_rules =[
        'name'=>'required',
        'email' => 'required|email|unique:users,email',
        'password'=>'required',
        'isTeacher'=>'required|boolean',
        'user_image'=>'required'
    ];

    public static array $update_rules =[
        'name'=>'required',
        'email' => 'required|email',
        'current_password'=>'required',
        'new_password'=>'required',
    ];
}
