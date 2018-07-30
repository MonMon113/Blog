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
                <li><a href="#">Profile</a></li>
                <li><a href="{!! url('myblog') !!}">{{ Auth::user()->name }}</a></li>
                <li><a href="#">New Blog</a></li>
            </ul>
            @endguest
        </nav>
    </header>

    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#">Reset Password</a></h2>                
                </div>
            </header>
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                <div class="row uniform">
                    @csrf

                    <div class="12u$">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="12u$">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </article>
    </div>

    <section id="sidebar">

        <section id="intro">
            <a href="#" class="logo"><img src="../images/logo.jpg" alt="" /></a>
            <header>
                <h2>Future Imperfect</h2>
                <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
            </header>
        </section>
    </section>
</div>
@endsection

