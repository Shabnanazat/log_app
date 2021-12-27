<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\Category;
use Mail;
class BlogController extends Controller
{
    public function index()
    {
    
        $blogs =Blog::with('category')->latest()->get();
        //return $blogs;
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(){
         $categories= Category::all();
        return view('admin.blog.create',compact('categories'));
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
        $blogs = Blog::where('status', 1)->with('blogImages')->latest()->get();
        $blogs = Blog::find($id); 
        $categories = Category::all();

        return view('admin.blog.edit',compact('blogs','categories'));     
        
     
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

        return redirect()->route('blogPost.index')->with('success','Blog updated successfully');
}}
        public function delete(Request $request,$id)
        {
         
          $doc = Blog::find($id)->first();
        
          if(Storage::disk('public')->exists('blogs/blog_images/'.$doc['image'])) {
            Storage::disk('public')->delete('blogs/blog_images/'.$doc['image']);
        }
           $doc->delete();
            
            return redirect()->route('blogPost.index')->with('success','blog deleted successfully');
        }
        public function imageUpload()
        {
            return view('imageUpload');
        }
        public function changeStatus(Request $request)
        {
        //    dd($request->all());

            $data=['gggg' => true];
            // $blogstatus=Blog::
            $blog = Blog::with('owner')-> find($request->blog_id);
            $blog ->update(['is_approved'=>$request->value]);
             if($blog)
             {
                Mail::send('mail.mail', $data, function($message) use( $blog){
                $message->to('athena@netstager.in','Blog status changed');
                $message->subject('Laravel Basic Testing Mail');
                $message->from('sneha@netstager.in','BLOG ADMIN');
            });
             }
          
      
            return response()->json(['success'=>'Action change successfully.']);
        }
      
        }
        
        
             
      



