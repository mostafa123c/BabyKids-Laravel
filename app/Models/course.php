<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'price' , 'description' , 'image'];

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
