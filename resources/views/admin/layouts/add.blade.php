<!DOCTYPE html>
<html lang="en">
<?php //print_r($search);exit;?>
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Blog</title>
       
    <style>
        /* To remove arrow from number inputs */
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        .cursorpoint{

            cursor:pointer;
        }
        .bold{

font-weight:bold;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

footer {
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
  position: absolute;
    width: 98%;
    bottom: 0;
}
</style> 
@stack('css')
</head>
<body>
    <header>
        @include('admin.layouts.header')
    </header>


    @yield('content')
    
    @stack('js')

    @include('admin.layouts.footer')

    

</body>

</html>