<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'description' , 'image' ,'course_id'];

    public function course()
    {
        return $this->belongsTo(course::class , 'course_id' , 'id');
    }

    public static function rules()
    {
        return [
            'name'=>'required|min:5',
            'description' => 'required|min:5',
            'course_id' => 'required',
        ];
    }

    public function getImageAttribute($value)
    {
        return 'images/teacher/'.$value;
    }
}
