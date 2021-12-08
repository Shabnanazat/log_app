<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
</head>
<body>
  <div>

    <ul >
      <Li> <p><b>{{ $blog->tittle }}</b></p> </Li>  
      <Li>Posted On :- {{  date("d M Y", strtotime($blog->created_at)) }}</Li>  
      <Li>Auther :-  {{ $blog->owner->first_name }}</Li>        
      <Li>Details :-  {{ $blog->description}}</Li>        
            
    </ul>

  </div>
</body>
</html>