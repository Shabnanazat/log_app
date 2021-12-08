@extends('user.layouts.sub')
 
@push('css')

<style>

</style>

@endpush
@section('content')
 
<h2> Add blogs types</h2>
<form action="{{route('blogs.update')}}" method="post">
    
    @csrf
    <input type="hidden" name="blogs_id" value="{{ $blogs->id }}">
    <label for="tittle">tittle:</label><br>
    <input type="text" id="name" name="tittle" value="{{ $blogs->tittle }}"><br>
    <label for="status">status:</label><br>
    {{-- <input type="text" id="status" name="status"><br>
    --}}
    <select name="status">
        <option value="1" @if($blogs->status == 1) selected="selected" @endif>Enable</option>
        <option value="0" @if($blogs->status == 0) selected="selected" @endif>Disable</option>
        </select><br>
    <input type="submit" value="Submit">

</form> 


 <p> </p>

</body>
</html>
@endsection

@push('js')


@endpush







