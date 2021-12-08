<?php

namespace App\Http\Controllers\User;
use App\Models\Blog;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs =Blog::with('category')->latest()->get();
        // dd($blogs);
        return view('user.blog.index',compact('blogs'));
    }
    public function create(){
         $categories= Category::all();
        return view('user.blog.create',compact('categories'));
    }
    public function store(Request $request)
    { 
        $userId = auth()->guard('user')->user()->id;
        return $userId;
         $userId = 2;
        $input = [
            'tittle' => $request->tittle,
            'category_id' => $request->category,
            'user_id'=>$userId,
            'description' =>$request->description,
            'status'=>$request->status,
            'soft_delete' => 'required',
            'slug' => $request->slug,
        ];
       
        $action =Blog::create( $input);
        if($action){
            return redirect(route('blogs.index'))->with('message',"Blog Created Successfully !");
         }else{
           return back()->with('message','Sorry Action Failed !'); 
         }}
    
    public function edit(request $request,$id)
    {
       // dd($request->all());
        $blogs = Blog::find($id); 
        return view('user.blog.edit',compact('blogs'));     
        
     
    }
    public function update(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'blog_id' => 'required|max:100|string',
        //     'tittle' => 'required|max:100|string',
        //     'description' => 'required|max:100|string',
        //     'status' => 'required|integer|max:1',
        // ]);
        $data = $request->except(['_token','blog_id']);
             $blog = Blog::find($request->blogs_id)->update($data);

        return redirect()->route('blogs.index')->with('success','Blog updated successfully');
        }
        public function delete(Request $request,$id)
        {
           
          
           Blog::find($id)->delete();
            
            return redirect()->route('blogs.index')->with('success','blog deleted successfully');
        }
        }
        
             
      



