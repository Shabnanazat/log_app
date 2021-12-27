<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            
        </a>
      

        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @if(Auth::guard('user')->check())
                    <li class="nav-item dropdown">
                        <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('user')->user()->first_name }} (USER) <span class="caret"></span>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.home')}}" class="dropdown-item">Dashboard</a>
                    </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                            Logout
                        </a>
                        <form id="admin-logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </li>
                     @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.web')}}">Blog</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}" tabindex="-1">Contact</a>
                        </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{route('about')}}">About</a>

                    </li>  
                        <select id="language-switch" name='lang'>
                        <option {{ (config('app.locale') == 'en') ? 'selected' : '' }} value='en'> Eng</option>
                        <option {{ (config('app.locale') == 'ml') ? 'selected' : '' }} value='ml'>Malayalam</option>                                 
                       </select>
                         <div id="another_div"></div>
                    </ul>

                </div>
           </nav>
    </div>
</nav>  