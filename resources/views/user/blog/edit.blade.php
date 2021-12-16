@extends('user.layouts.sub')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> Add blogs types</h2>
<form action="{{route('blogs.update')}}" method="post" enctype="multipart/form-data">
    
    @csrf
    <input type="hidden" name="blogs_id" value="{{ $blogs->id }}">
    <label for="tittle">tittle:</label><br>
    <input type="text" id="name" name="tittle" value="{{ $blogs->tittle }}"><br>
    <label for="slug">slug:</label><br>
    <input type="text" id="slug" value="{{ $blogs->slug }}" name="slug"><br>
    <label for="description">description:</label><br>
    <input type="text" id="description" value="{{ $blogs->description }}"  name="description"><br>
    <label type="file" >image</label><br>
    <input type="file" name="image" ><br>
    <label for="Category">Category</label><br>
    <select name="category_id" id="category">
            @if(!empty($categories))
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
        @endif
        </select><br>
        <label for="status">status:</label><br>
        <select name="status">
            <option {{ ($categories) }} value="1">Enable</option>
            <option value="0">Disable</option>
        </select>
        <br>
        <input type="submit" value="Submit"> 
        </form> 


 <p> </p>

 </body>
 </html>
@endsection

@push('js')


@endpush




