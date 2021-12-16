<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\Category;


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
       // $userId = auth()->guard('user')->user()->id;
       // return $userId;
        $userId = 1;
        //$imageName = '';
       if($request->hasFile('image')){
       $imageName = time()."_blogimage.". $request->file('image')->getClientOriginalExtension();  

       storage::disk('public')->putFileAs('/blogs/blog_images/',$request->file('image'), $imageName);
       }
        
        $data = [
            'tittle' => $request->tittle,
            'category_id' => $request->category,                
            'user_id'=>$userId,
            'description' =>$request->description,
            'image'=> $imageName,  
            'status'=>$request->status,
            'soft_delete' => 'required',
            'slug' => $request->slug,

        ];

        $blog = Blog::create($data);

        
        
        if($blog){
            return redirect(route('blogs.index'))->with('message',"Blog Created Successfully !");
         }else{
           return back()->with('message','Sorry Action Failed !'); 
         }
        }
       public function edit(request $request,$id)
    {
       // dd($request->all());
        $blogs = Blog::find($id); 
        $categories = Category::all();

        return view('user.blog.edit',compact('blogs','categories'));     
        
     
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
        $imageName = "no-image";
       
         if ($request->hasFile('image')) {
          
              $doc = Blog::find($request->blogs_id)->first();
          
              $file_path = Storage::disk('public')->url('blogs/blog_images/'.$doc['image']);
          
            if(Storage::disk('public')->exists('blogs/blog_images/'.$doc['image'])) {
                Storage::disk('public')->delete('blogs/blog_images/'.$doc['image']);
            }
                
            $imageName = time()."_blogimage.". $request->file('image')->getClientOriginalExtension();      
            storage::disk('public')->putFileAs('/blogs/blog_images/',$request->file('image'), $imageName);
            
           
        
          $data = [
        //'user_id' => Auth::user()->id,
        'category_id' => $request->category_id,  
        'tittle' => $request->tittle,
        'description' =>$request->description,
        'image'=> $imageName, 
        'status'=>$request->status,
        'slug' => $request->slug
    ];
 
             $blog = Blog::find($request->blogs_id)->update($data);

        return redirect()->route('blogs.index')->with('success','Blog updated successfully');
}}
        public function delete(Request $request,$id)
        {
         
          $doc = Blog::find($id)->first();
        
          if(Storage::disk('public')->exists('blogs/blog_images/'.$doc['image'])) {
            Storage::disk('public')->delete('blogs/blog_images/'.$doc['image']);
        }
           $doc->delete();
            
            return redirect()->route('blogs.index')->with('success','blog deleted successfully');
        }
        public function imageUpload()
        {
            return view('imageUpload');
        }
        // public function imageUploadPost(Request $request)
        // {
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
            
        //     $image = time().'.'.$request->image->extension();           
            
        //     $request->image->move(public_path('images'), $image);
        //     /* Store $imageName name in DATABASE from HERE */    
        //     return back()
        //         ->with('success','You have successfully upload image.')
        //         ->with('image',$image); 
        // }
    
        }
        
        
             
      



