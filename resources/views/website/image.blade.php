@extends('user.layouts.user_app')


@section('content')

<form action="/image-upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Upload</button>
</form>
@endsection