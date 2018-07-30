@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h1><a href="{!! url('home') !!}">My Blog</a></h1>
        <nav class="links">
            @guest
            <ul>
                <li><a href="{{ route('login') }}">{{ __('Login') }}</li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</li>
            </ul>
            @else
            <ul>
                <li><a href="{!! url('profile') !!}">Profile</a></li>
                <li><a href="{!! url('myblog') !!}">{{ Auth::user()->name }}</a></li>
                <li><a href="{!! url('newblog') !!}">New Blog</a></li>
            </ul>
            @endguest
        </nav>
    </header>

    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#">Login</a></h2>                
                </div>
            </header>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                <div class="row uniform">
                    @csrf
                    <div class="12u$">
                        <div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="12u$">
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="6u 12u$(small)">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="12u$">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        </br>
                        <p>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </p>
                    </div>
                </div>
            </form>           
        </article>
    </div>

    <section id="sidebar">

        <section id="intro">
            <a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
            <header>
                <h2>Future Imperfect</h2>
                <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
            </header>
        </section>
    </section>
</div>
@endsection
