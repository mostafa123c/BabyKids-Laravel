<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\activity;
use App\Models\course;
use App\Models\faq;
use App\Models\slider;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function index()
    {
//        dump(Auth::user()->id);
//        dd(Auth()->user()->email);

        $admin =Auth::User()->name;
        $teachers = Teacher::count();
        $courses = Course::count();
        $activities = Activity::count();
        $sliders = slider::count();
        $faqs = faq::count();
        return view('admin.index' , compact( 'admin', 'teachers' , 'courses' , 'activities' , 'sliders' , 'faqs'));
    }
}
