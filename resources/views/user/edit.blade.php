@extends('user.layouts.userloggedin_app')
@section('content')
<p>USER DASHBOARD</p>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
   
                <div class="card-body">
                    <form method="POST" action="{{ route('user.edit_profile_post') }}">
                        @csrf 
   
                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
                        {{-- {{ dd(Auth::admins()) }} --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First_name</label>
  
                            <div class="col-md-6">
                                <input id="name" type="password" class="form-control" name="first_name" autocomplete="current-password">
                            </div>
                        </div>
  
                        
  
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last_name</label>
    
                            <div class="col-md-6">
                                <input id="name" type="profile" class="form-control" name="last_name" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">Phone_number</label>
    
                            <div class="col-md-6">
                                <input id="number" type="profile" class="form-control" name="Phone_number" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
