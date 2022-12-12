<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\AddSliderRequest;
use App\Http\Requests\Slider\DeleteSlider;
use App\Http\Traits\imagestrait;
use App\Models\slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSliderController extends Controller
{
    use imagestrait;

    public function create()
    {
         return view('Admin.slider.create');
    }
    public function store(AddSliderRequest $request)
    {
        $filename = time() . '_slider.png';

        $this->uploadimage($request->image,$filename,'slider');

        slider::create([
            'image' => $filename
        ]);
        Alert::success('Success', 'slider was created');

        return redirect()->back();

    }

    public function index()
    {
        $sliders = slider::get();
        return view('admin.slider.sliders',compact('sliders'));
    }

    public function delete(DeleteSlider $request)
    {
        $slider = slider::find($request->slider_id);
        unlink(public_path($slider->image));
        $slider->delete();
        Alert::success('Success', 'slider was deleted');
        return redirect()->back();
    }

    public function edit($sliderid)
    {
        $slider = slider::find($sliderid);
        return view('Admin.slider.edit' , compact('slider'));
    }

    /**
     * @param Request $request
     * @return void
     * upload new file
     * delete old file
     * update new file name
     */
    public function update(Request $request)
    {
        $slider = slider::find($request->slider_id);
        $imagename = time() . '_slider.png';
        $this->uploadimage($request->image,$imagename,'slider' , $slider->image);
        $slider->update([
            'image'=>$imagename
        ]);

        Alert::success('Success', 'slider was updated !');

        return redirect(route('admin.slider.all'));
    }
}
