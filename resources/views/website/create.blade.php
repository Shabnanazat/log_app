@extends('user.layouts.app')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> Add Blog</h2>
<form action="{{route('website.blog.store')}}" method="post">
<label for="tittle">tittle:</label><br>
<input type="string" id="tittle" name="tittle"><br>
<label for="description">description:</label><br>
<input type="text" id="description" name="description"><br>
<input type="date">Date:</label><br>
{{ $user->from_date->format('d/m/Y')}}
<input type="submit" value="Submit">
@csrf

</form>

</body>
</html>
@endsection

@push('js')


@endpush







