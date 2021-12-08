@extends('admin.layouts.add')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> ADD CATEGORY</h2>
<form action="{{route('categories.store')}}" method="post">
<label for="cname">name:</label><br>
<input type="text" id="name" name="category_name" ><br>
<label for="status">status:</label><br>
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







