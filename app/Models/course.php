<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'price' , 'description' , 'image'];

    public function teacher()
    {
        return $this->hasOne(teacher::class , 'course_id' , 'id');
    }

    public function allteachers()
    {
        return $this->hasMany(teacher::class , 'course_id' , 'id');
    }

    public static function rules()
    {
        return [
            'name'=>'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required',
        ];
    }

    public function getImageAttribute($value)
    {
        return 'images/course/'.$value;
    }
}
