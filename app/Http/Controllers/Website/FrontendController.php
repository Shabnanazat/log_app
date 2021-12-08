<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Enquiry;
use Validator;
class FrontendController extends Controller
{ 
    public function index(){
        return view('website.home');
    }
    public function blog(){
        $blogs = Blog::with('owner') ->latest()->where('status',1)->get();
        return view('website.blog',compact('blogs'));
    }
     
    public function details(request $request, $id)
    {
        $blog = Blog::find($id); 
        return view('website.details',compact('blog'));     
        
     
    }
    public function contactUs(){

        return view('website.contact');
    }
    public function contactSubmit(Request $request){
        
        $validator = Validator::make($request->all(),['name'=>'required|max:100','email'=>'required|email','phone'=>'required|numeric','city'=>'required','message'=>'required|max:500'],[
            'name.required' => 'Please Fill the name Field',
            'body.required' => 'A message is required',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput($request->all());
        }
        $enquiry = $request->all();
        Enquiry::create($enquiry);
        if($enquiry){
            return redirect(route('contact'))->with('message',"Your Enquirey has recieved Our Representative will contact You shortly Successfully !");
         }else{
           return back()->with('message','Sorry Action Failed !'); 
         }
        }

      
    }



