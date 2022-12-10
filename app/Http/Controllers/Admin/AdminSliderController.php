<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\AddSliderRequest;
use App\Http\Traits\imagestrait;
use App\Models\slider;
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
}
