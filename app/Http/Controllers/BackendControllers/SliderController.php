<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class SliderController extends Controller
{
    public function list()
    {
        $slider = Slider::all();
        return view('Backend.Pages.Slider.Slider_List', compact('slider'));
    }

    public function create()
    {
        return view('Backend.Pages.Slider.Add_Slider');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required|max:100',
            'link' => 'required',
            'image' => 'required',
            File::types(['jpg'])->min(100)->max(1024),
        ]);

        if ($validation->failed()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $file_name = null;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $file_name = 'ossp_' . date('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('uploads/slider_img/', $file_name);
        }

        Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'slug' => $request->slug,
            'description' => $request->description,
            'link' => $request->link,
            'photo' => $file_name
        ]);
        notify()->success('New Slider Added Successfully.');
        return redirect()->route('Slider');
    }

    public function update($slug)
    {
        $slider_info = Slider::where('slug', $slug)->first();
        return view('Backend.Pages.Slider.Update_Slider', compact('slider_info'));
    }

    public function update_store(Request $request, $id)
    {
        $slider = Slider::find($id);
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required|max:100',
            'link' => 'required',
            'image' => File::types(['jpg'])->min(100)->max(1024),
        ]);

        if ($validation->failed()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $file_name = $slider->photo;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $file_name = 'ossp_' . date('YmdHis') . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('uploads/slider_img/', $file_name);
        }

        $slider->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'slug' => $request->slug,
            'description' => $request->description,
            'link' => $request->link,
            'photo' => $file_name
        ]);
        notify()->success('Slider Update Successfully.');
        return redirect()->route('Slider');
    }

    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider->status == 1) {
            $slider->update([
                'status' => 0
            ]);
        } else {
            $slider->update([
                'status' => 1
            ]);
        }
        return redirect()->back();
    }
}
