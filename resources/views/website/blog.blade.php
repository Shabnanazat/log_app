@extends('user.layouts.user_app')

@section('content')
<h1> BLOGS </h1>
  
  <div>
    @foreach ($blogs as $blog)

    <ul >
      <Li> <a href="{{ route('blog.details',$blog->id) }}">{{ $blog->tittle }}</a> </Li>  
      <Li>Posted On :- {{  date("d M Y", strtotime($blog['created_at'])) }}</Li>  
      <Li>Auther :-  {{ $blog->owner->first_name }}</Li>        
    </ul>
    @endforeach

  </div>
@endsection
