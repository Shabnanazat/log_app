@extends('admin.layouts.add')
 
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
<h1>CATEGORY</h1>
<a href="{{route('categories.create')}}">Add Category</a>
</div>
@if (Session::has('success'))
  {{ Session::get('success') }}
@endif
<table border="1" class="table-list">
  <thead>
    <tr>
      <th>Sl Num</th>
      <th>Name</th>
      <th>icon</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $item)
      <tr>
        <td class="index">{{ $loop->iteration }}</td>
        <td>{{ $item->category_name }}</td>
        <td> <img class="img" src="{{ asset('storage/admin/category/'.$item->icon) }}"alt="blog-image" ></td>
        <td>
      
        <a
         href="{{route('categories.edit',[$item->id]) }}"
               class="btn btn-primary"><i
        class="fa fa-pencil-square-o"></i>Edit</a>
        </td>
        <td>

         <form method="POST" action="{{ route('categories.destroy',$item->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger" title="Delete Business" onclick="return confirm('Are you sure?')">DELETE </button>

        </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection

@push('js')
@endpush