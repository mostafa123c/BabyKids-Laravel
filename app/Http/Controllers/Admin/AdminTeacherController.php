<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\AddTeacher;
use App\Http\Requests\Teacher\DeleteTeacher;
use App\Http\Requests\Teacher\UpdateTeacher;
use App\Http\Traits\imagestrait;
use App\Models\course;
use App\Models\teacher;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTeacherController extends Controller
{
    use imagestrait;
    public function index()
    {
        $teachers =teacher::with('course')->get();     //course is a function in model
        return view('admin.teacher.teachers' ,compact('teachers'));
    }

    public function create()
    {
        $courses =course::select('id' ,'name')->get();
        return view('admin.teacher.create' , compact('courses'));
    }

    public function store(AddTeacher $request)
    {
        $filename = time() . '-teacher.png';
        $this->uploadimage($request->image,$filename,'teacher');
        teacher::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'image'=>$filename
        ]);
        Alert::success('Success', 'teacher created !');

        return redirect(route('admin.teacher.all'));

    }

    public function delete(DeleteTeacher $request)
    {
        $teacher = teacher::find($request->teacher_id);
        unlink(public_path($teacher->image));
        $teacher->delete();

        Alert::success('Success', 'Teacher deleted');

        return redirect()->back();
    }

    public function edit($teacherid)
    {
        $courses =course::select('id' ,'name')->get();
        $teacher = teacher::find($teacherid);
        return view('admin.teacher.edit' , compact('courses' , 'teacher'));
    }



    public function update(UpdateTeacher $request)
    {
        $teacher = teacher::find($request->teacher_id);


        if($request->has('image')){
            $imagename = time() . '_teacher.png';
            $this->uploadimage($request->image ,$imagename,'teacher',$teacher->image);
        }
        $teacher->update([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'image'=>(isset($imagename))? $imagename : $teacher->getRawOriginal('image')
        ]);

        Alert::success('Success', 'Teacher updated !');

        return redirect(route('admin.teacher.all'));

    }

}
