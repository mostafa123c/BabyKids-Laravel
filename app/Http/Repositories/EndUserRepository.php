<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\EndUserInterface;
use App\Models\activity;
use App\Models\course;
use App\Models\slider;
use App\Models\teacher;

class EndUserRepository implements EndUserInterface
{
    public function index()
    {
        $sliders = Slider::get();
        $activities = Activity::get();
        return view('user.index', compact('sliders' , 'activities'));
    }

    public function courses()
    {
        $courses = Course::get();
        return view('user.courses', compact('courses'));
    }

    public function teachers()
    {
        $teachers = Teacher::get();
        return view('user.teachers', compact('teachers'));
    }
}
