<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\DeleteFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\faq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AdminFaqController extends Controller
{

    public function index()
    {
        $faqs=faq::get();
        return view('Admin.Faq.faqs',compact('faqs'));
    }
    public function create()
    {
        return view('Admin.Faq.create');
    }

    /**
     * @param CreateFaqRequest $request
     * 1-validate data .
     * 2-store data .
     * 3-open sessions .
     * 4-return.
     */
    public function store(CreateFaqRequest $request)
    {
        faq::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        Alert::success('Success', 'faq was created');


        return redirect()->back();
    }

    public function delete(DeleteFaqRequest $request)
    {
        faq::where('id' , $request->faq_id)->delete();

        Alert::success('Success', 'faq was deleted');

        return redirect()->back();
    }

    public function edit($faqid)
    {
        $faq = faq::find($faqid);
        return view('Admin.faq.edit' , compact('faq'));

    }

    /**
     * @param UpdateFaqRequest $request
     * @return void
     * 1-get faq data
     * 2-update
     * 3-fire alert
     * 4-return
     */
    public function update(UpdateFaqRequest $request)
    {
        $faq=faq::find($request->faq_id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);

        Alert::success('Success', 'faq was updated');

        return redirect()->route('faqs');


    }
}
