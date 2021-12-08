<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

        $categories = Category::latest()->get();
        return view('admin.Categories.index',compact('categories'));
    }
    public function create(){

        return view('admin.Categories.create');
    }
    public function store(Request $request){

        $validator = $request->validate(['category_name'=>'required']);

        $action =  Category::create($request->except('_token'));

       if($action){
          return redirect(route('categories.index'))->with('message',"Category Created Successfully !");
       }else{
         return back()->with('message','Sorry Action Failed !');
       }}
       
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
       // $categories = categories::where('id',$id)->first(); 
        $category = Category::find($id);   
       
         return view('admin.categories.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $request->validate([
            'category_name' => 'required|max:100|string',
            'status' => 'required|integer|max:1',
        ]);
        $data = $request->except(['_token','category_id']);
        $category = Category::find($request->category_id)->update($data);

        return redirect()->route('categories.index')->with('success','category updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       
       
        $category = Category::find($id)->delete();
        
        return redirect()->route('categories.index')->with('success','category deleted successfully');
    }
    }
    