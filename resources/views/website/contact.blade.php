@extends('user.layouts.user_app')


@section('content')

  
 <div class="fcf-body">

    <div id="fcf-form">
    <h1>Contact Form</h1>
        @if (Session::has('message'))
     {{ Session::get('message') }}
   @endif
    <!-- <form id="fcf-form-id" class="fcf-form-class" method="post" action="contact-form-process.php"> -->
    <form action="{{route('contact.submit')}}" name="contact-form"  onsubmit="return formValidation();" method="POST">
        @csrf
        <table class="table">
         
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td> <input type="text" name="name" id="name" >
                    <p id="name_err"></p>
                    {!!$errors->first('name','<p>:message <p>')!!}
                
                     </td>
                </tr>
                <tr>
               
                    <td>Email:</td>
                    <td> <input type="email" name="email" >
                     <p id="email_err"></p>
                    {!!$errors->first('email','<p>:message <p>')!!}
                     </td>
                   
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td> <input type="text" name="phone" id="phone" >
                     <p id="phone_err"></p>
                    {!!$errors->first('phone','<p>:message <p>')!!}
                     </td>
                     
                </tr>
                <tr>
                
                    <td>City:</td>

                    <td> <select name="city"style="color: green"> 
                        <option value="select city"> select city</option>
                        <option value="calicut" > Calicut </option>
                        <option value="kochi" > Kochi </option>
                        <option value="kannur" > Kannur </option>
                        <option value="wayanad" > Wayanad </option>
                        <option value="munnar" > Munnar </option>
                        
                </select>        
                </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td> <textarea name="message" rows="5" cols="30">  </textarea>{!!$errors->first('message','<p>:message <p>')!!}</td>
                </tr>
              
                <tr>
                 <td>
                 &nbsp;
                    <td> <input type="submit"style="color: red"> </td>
                </tr>
              
        </table>

@endsection

