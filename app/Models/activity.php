<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'slug' , 'icon'];

    public static function rules()
    {
        return [
            'title'=>'required|min:5',
            'slug' => 'required|min:5',
        ];
    }

    public function getIconAttribute($value)
    {
        return 'images/activity/'.$value;
    }

}

