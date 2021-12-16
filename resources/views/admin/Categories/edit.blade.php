@extends('admin.layouts.add')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> Add post type</h2>
<form action="{{route('categories.update')}}" method="post" enctype="multipart/form-data">
    
    @csrf
    <input type="hidden" name="category_id" value="{{ $category->id }}">
    <label for="cname">name:</label><br>
    <input type="text" id="name" name="category_name" value="{{ $category->category_name }}"><br>
    <label for="status">status:</label><br>
    <input type="file" name="icon"><br>
    <label for="status">status:</label><br>
    {{-- <input type="text" id="status" name="status"><br>
    --}}
    <select name="status">
        <option value="1" @if($category->status == 1) selected="selected" @endif>Enable</option>
        <option value="0" @if($category->status == 0) selected="selected" @endif>Disable</option>
        </select><br>
    <input type="submit" value="Submit">

</form> 


 <p> </p>

</body>
</html>
@endsection

@push('js')


@endpush







