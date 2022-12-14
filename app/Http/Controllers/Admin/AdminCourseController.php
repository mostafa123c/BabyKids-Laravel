<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\course\DeleteCourse;
use App\Http\Requests\course\AddCourse;
use App\Http\Requests\course\UpdateCourse;
use App\Http\Traits\imagestrait;
use App\Models\course;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCourseController extends Controller
{
    use imagestrait;
    public function index()
    {
        $courses =course::with('teacher')->get();
        return view('admin.course.courses' ,compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(AddCourse $request)
    {
        $filename = time() . '-course.png';
        $this->uploadimage($request->image,$filename,'course');
        course::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image'=>$filename
        ]);
        Alert::success('Success', 'course was created');

        return redirect(route('admin.course.all'));

    }

    public function delete(DeleteCourse $request)
    {
        $course = course::find($request->course_id);
        unlink(public_path($course->image));
        $course->delete();

        Alert::success('Success', 'Course was deleted');

        return redirect()->back();
    }

    public function edit($courseid)
    {
        $course = course::find($courseid);
        return view('admin.course.edit' , compact('course'));
    }



    public function update(UpdateCourse $request)
    {
        $course = course::find($request->course_id);


        if($request->has('image')){
            $imagename = time() . '_course.png';
            $this->uploadimage($request->image ,$imagename,'course',$course->image);
        }
        $course->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image'=>(isset($imagename))? $imagename : $course->getRawOriginal('image')
        ]);

        Alert::success('Success', 'course updated !');

        return redirect(route('admin.course.all'));

    }
}
