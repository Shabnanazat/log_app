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
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
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
      <th><b>Edit</b></th>
      <th><b>Delete</b></th>
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
        <td>
        <a
         href="{{route('blogs.edit',[$blog->id]) }}"
               class="btn btn-primary"><i
        class="fa fa-pencil-square-o"></i>Edit</a>
        </td>
        <td>

         <form method="POST" action="{{ route('blogs.destroy',[$blog->id]) }}" accept-charset="UTF-8" style="display:inline">
          @csrf
        <button type="submit" class="btn btn-danger" title="Delete Business" onclick="return confirm('Are you sure?')">DELETE </button>
         </form>
        </td>
        </tr>
@endforeach
  </tbody>
</table>
@endsection

@push('js')
@endpush