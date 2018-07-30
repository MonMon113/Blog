@extends('layouts.app')

@section('content')
<body class="single">
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
            <nav class="main">
                <ul>
                    <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div id="main">
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="#">PROFILE INFORMATION</a></h2>
                    </div>
                </header>
                <form class="form-horizontal" method="POST" action="{{ url('/profile/update') }}" enctype="multipart/form-data">
                    <div class="row uniform">
                        <input type='hidden' value="{!! csrf_token() !!}" name='_token' />

                        <div class="12u$">
                            <label for="name"><h3>Avatar</h3></label>
                            <div class="col-md-6">
                                <img style="max-width: 300px; height: auto;" src="{{ 'images/' . Auth::user()->url }}">
                            </div>
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <label for="name"><h3>Name</h3></label>                            
                            <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" disabled="disabled">
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <label for="email"><h3>Email</h3></label>
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" disabled="disabled"required>
                        </div>

                        <div class="12u$">
                            <label for="file"><h3>Change Avatar</h3></label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <label for="password"><h3>Change password</h3></label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <div class="6u 12u$(xsmall)">
                            <label for="password-confirm"><h3>Confirm password</h3></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="12u$">
                            <label for="date_of_birth"><h3>Date of birth</h3></label>
                            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
                        </div>

                        <div class="12u$">
                            <label for="sex"><h3>Sex</h3></label>
                        </div>

                        <div class="4u 12u$(small)">
                            <input type="radio" id="male" name="sex" value="Male"<?php echo (Auth::user()->sex == "Male" ? 'checked="checked"': ''); ?>>
                            <label for="male">Male</label>
                        </div>
                        <div class="4u 12u$(small)">
                            <input type="radio" id="female" name="sex" value="Female" <?php echo (Auth::user()->sex == "Female" ? 'checked="checked"': ''); ?>>
                            <label for="female">Female</label>
                        </div>
                        <div class="4u 12u$(small)">
                            <input type="radio" id="other" name="sex" value="Other" <?php echo (Auth::user()->sex == "Other" ? 'checked="checked"': ''); ?>>
                            <label for="other">Other</label>
                        </div>

                        <div class="12u$">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    UPDATE
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        </div>
        <!-- Menu -->
        <section id="menu">

            <!-- Search -->
                <section>
                    <form class="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search" />
                    </form>
                </section>

            <!-- Links -->
                <section>
                    <ul class="links">
                        <li>
                            <a href="#">
                                <h3>Lorem ipsum</h3>
                                <p>Feugiat tempus veroeros dolor</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Dolor sit amet</h3>
                                <p>Sed vitae justo condimentum</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Feugiat veroeros</h3>
                                <p>Phasellus sed ultricies mi congue</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Etiam sed consequat</h3>
                                <p>Porta lectus amet ultricies</p>
                            </a>
                        </li>
                    </ul>
                </section>

            <!-- Actions -->
                <section>
                    <ul class="actions vertical">
                        <li><a href="#" class="button big fit">Log In</a></li>
                    </ul>
                </section>
        </section>

        <section id="footer">
            <ul class="icons">
                <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
        </section>

    </div>
</body>
@endsection