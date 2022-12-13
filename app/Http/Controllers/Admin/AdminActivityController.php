<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\activity\AddActivityRequest;
use App\Http\Requests\activity\DeleteActivity;
use App\Http\Requests\activity\UpdateActivity;
use App\Http\Traits\imagestrait;
use App\Models\activity;
use RealRashid\SweetAlert\Facades\Alert;

class AdminActivityController extends Controller
{
    use imagestrait;
    public function index()
    {
        $activites =activity::get();
        return view('admin.activity.activites' ,compact('activites'));
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(AddActivityRequest $request)
    {
        $filename = time() . '-activity.png';
        $this->uploadimage($request->icon,$filename,'activity');
        activity::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon'=>$filename
        ]);
        Alert::success('Success', 'activity was created');

        return redirect(route('admin.activity.all'));

    }

    public function delete(DeleteActivity $request)
    {
        $activity = activity::find($request->activity_id);
        unlink(public_path($activity->icon));
        $activity->delete();

        Alert::success('Success', 'Activity was deleted');

        return redirect()->back();
    }

    public function edit($activityid)
    {
        $activity = activity::find($activityid);
         return view('admin.activity.edit' , compact('activity'));
    }



    public function update(UpdateActivity $request)
    {
        $activity = activity::find($request->activity_id);


        if($request->has('icon')){
            $iconname = time() . '_activity.png';
            $this->uploadimage($request->icon ,$iconname,'activity',$activity->icon);
        }
        $activity->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'icon'=>(isset($iconname))? $iconname : $activity->getRawOriginal('icon')
        ]);

        Alert::success('Success', 'activity was updated !');

        return redirect(route('admin.activity.all'));

    }

}
