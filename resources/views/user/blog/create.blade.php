@extends('user.layouts.sub')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> Add Blog</h2>
<form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
@csrf
<label for="tittle">tittle:</label><br>
<input type="string" id="tittle" name="tittle"><br>
<label for="slug">slug:</label><br>
<input type="string" id="slug" name="slug"><br>
<label for="description">description:</label><br>
<input type="text" id="description" name="description"><br>
<label type="file" >image</label><br>
<input type="file" name="image" ><br>
<label for="Category">Category</label><br>
<select name="category" id="category">
    @if(!empty($categories))
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
        @endif
</select><br>
<select name="status">
<option value="1">Enable</option>
<option value="0">Disable</option>
</select><br>
<input type="submit" value="Submit">
@csrf

</form> 


 <p> </p>

</body>
</html>
@endsection

@push('js')


@endpush







