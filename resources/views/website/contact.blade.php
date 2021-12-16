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
                    <td> <input type="text" name="name" value="{{ old('name')  }}" id="name" >
                    <p id="name_err"></p>
                    {!!$errors->first('name','<p>:message <p>')!!}
                
                     </td>
                </tr>
                <tr>
               
                    <td>Email:</td>
                    <td> <input type="email" name="email" value="{{ old('email') }}" id="email">
                     <p id="email_err"></p>
                    {!!$errors->first('email','<p>:message <p>')!!}
                     </td>
                   
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td> <input type="text" name="phone" value="{{ old('phone') }}" id="phone" >
                     <p id="phone_err"></p>
                    {!!$errors->first('phone','<p>:message <p>')!!}
                     </td>
                     
                </tr>
                <tr>
                
                    <td>City:</td>

                    <td> <select name="city"style="color: green" > 
                        <option {{ (old('city') == "") ? 'selected' : '' }} value="">Select city</option>
                        <option {{ (old('city') == 'calicut') ? 'selected' : '' }} value="calicut"> Calicut </option>
                        <option {{ (old('city') == 'kochi') ? 'selected' : '' }} value="kochi"> Kochi </option>
                        <option {{ (old('city') == 'kannur') ? 'selected' : '' }} value="kannur"> Kannur </option>
                        <option {{ (old('city') == 'wayanad') ? 'selected' : '' }} value="wayanad"> Wayanad </option>
                        <option {{ (old('city') == 'munnar') ? 'selected' : '' }} value="munnar"> Munnar </option>
                        <p id="city_err"></p>
                         {!!$errors->first('city','<p>:message <p>')!!}           
                     
                </select>        
                </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td> <textarea name="message" rows="5" cols="30">{{ old('message') }}</textarea>
                      <p id="message_err"></p>
                    {!!$errors->first('message','<p>:message <p>')!!}</td>
                </tr>
              
                <tr>
                 <td>
                 &nbsp;
                    <td> <input type="submit"style="color: red"> </td>
                </tr>
              </tbody>
        </table>

@endsection

