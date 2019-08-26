<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index(){
    	$sliders =Slider::all();
    	return view('admin.slider.index',compact('sliders'));
    }

    public function create(){

        return view('admin.slider.create');
    }



    public function store(Request $request){

        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp.png',
        ]);
         $image= $request->file('image');
         $slug = str_slug($request->title);
         if (isset($image))
         {
             $currentDate= Carbon::now()->toDateString();
             $imagename= $slug.'-'. $currentDate .'-'. uniqid().'.'.
                 $image->getClientOriginalExtension();
             if (!file_exists('uploads/slider'))
             {
                 mkdir('uploads/slider',0777, true);
             }
             $image->move('uploads/slider', $imagename);
         }
         else{
             $imagename='dafault.png';
         }
// for database connection
         $slider = new  Slider();
         $slider->title= $request->title;
         $slider->sub_title= $request->sub_title;
         $slider->image= $imagename;
         $slider->save();
         return redirect()->route('slider.index')->with('successMsg','Slider save successfully');

    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'mimes:jpeg,jpg,bmp.png',
        ]);
        $image= $request->file('image');
        $slug = str_slug($request->title);
        $slider= Slider::find($id);
        if (isset($image))
        {
            $currentDate= Carbon::now()->toDateString();
            $imagename= $slug.'-'. $currentDate .'-'. uniqid().'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider',0777, true);
            }
            $image->move('uploads/slider', $imagename);
        }
        else{
            $imagename= $slider->image;
        }
// for database connection

        $slider->title= $request->title;
        $slider->sub_title= $request->sub_title;
        $slider->image= $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider update successfully');

    }

   public function destroy($id){
        //ai gula aktu delete kore error check korbo kal
       $slider = Slider::find($id);
       if (file_exists('uploads/slider/'.$slider->image))
       {
           unlink('uploads/slider/'.$slider->image);
       }
       $slider->delete();
       return redirect()->back()->with('successMsg','Slider Successfully Delete');
   }
}
