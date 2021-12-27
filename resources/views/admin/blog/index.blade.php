@extends('user.layouts.sub')

@push('css')

<style>

.button {
  border: none;
  color: black;
  float: right;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 1px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

.table-list{
    padding: 10px;
    width: 100%;
    background: beige;
    text-align: center;

}

</style>

@endpush

@section('content')
<div id="myDIV" class="header">  
<h1><b>BLOG<b></h1>
<a href="{{route('blogs.create')}}">Add Blogs </a>
</div>
@if (Session::has('success'))
  {{ Session::get('success') }}
@endif
<table border="1" class="table-list">
  <thead>
    <tr>
      <th><b>Sl</b></th>
      <th><b>Titile</b></th>
      <th><b>slug</b></th>
      <th><b>Description</b></th>
      <th><b>Category</b></th>
      <th><b>Image</b></th>
       <th><b>Edit</b></th> 
       <th><b>Action</b></th>
       {{-- <th><b>Delete</b></th> --}}
    </tr>
  </thead>
  <tbody>
      <tr>
        @foreach($blogs as $blog)
        <td class="index">{{ $loop->iteration }}</td>
        <td>{{ $blog->tittle }}</td>
        <td>{{ $blog->slug }}</td>
        <td>{{ $blog->description }}</td>
        <td>{{ $blog->category->category_name }}</td>
        {{-- <td> <img src="{{ asset('storage/blogs/blog_images/'.$blog->image) }}" alt="blog-image" ></td> --}}
        <td> <img class="img" src="{{ \Storage::disk('public')->url('blogs/blog_images/'.$blog['image']) }}"alt="blog-image" ></td>             
         
       

         <td>
        <a
         href="{{route('blogs.edit',[$blog->id]) }}"
               class="btn btn-primary"><i
        class="fa fa-pencil-square-o"></i>Edit</a>
        </td> 
        
         <td>

         <form method="POST"  style="display:inline"> 
          @csrf 
       {{-- <button type="submit" class="btn btn-danger" title="Delete Business" onclick="return confirm('Are you sure?')">DELETE </button>
         </form>
        </td>   --}}
        
         <label class="switch">
          <input data-blog_id="{{ $blog->id }}" class="toggle-class" type="checkbox" checked>
          <span class="slider"></span>
        </label><br><br>
      </form>
    </td>
        </tr>
@endforeach
  </tbody>
</table>
@endsection

@push('js')
<script>
  $(function() {

    $('.toggle-class').change(function() { 
        var value = $(this).prop('checked') == true ? 1 : 0; 
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var blog_id = $(this).data('blog_id'); 
        
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '{{ route('blogPost.changeStatus')}}',
            data: {
              'value': value,
               'blog_id': blog_id ,
            '_token': CSRF_TOKEN
            },
            success: function(data){
             alert('Approval status changed');
            }
        });
    })
  })
</script>
@endpush