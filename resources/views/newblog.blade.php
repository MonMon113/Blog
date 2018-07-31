@extends('layouts.app')

@section('content')
<body class="single">
    <div id="wrapper">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
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
                        <form id="search" method="GET" action="{{ url('/search') }}">
                            <input type="text" name="search" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">

            <!-- Search -->
                <section>
                    <form id="search" method="GET" action="{{ url('/search') }}">
                        <input type="text" name="search" placeholder="Search" />
                    </form>
                </section>

            <!-- Actions -->
                <section>
                    @guest
                    <ul class="actions vertical">
                        <li><a href="{{ route('login') }}" class="button big fit">Log In</a></li>
                    </ul>
                    @else
                    <ul class="actions vertical">
                        <li>
                            <a class="dropdown-item button big fit" href="#" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{__("Logout")}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    @endguest
                </section>
        </section>

        <div class="main">
            <form class="form-horizontal" method="POST" action="{{ url('/newblog/add') }}" enctype="multipart/form-data">
            <input type='hidden' value="{!! csrf_token() !!}" name='_token' />
            <article class="post">
                <header>
                    <div class="12u$ title">
                        <h2>Subject</h2>
                        <input type="text" name="subject" id="subject" value="" placeholder="Subject" required>
                    </div>
                </header>
                <p style="margin-bottom: 1px;margin-top:-30px;">Update picture</p>
                <input type="file" name="file" id="file"/>
                <div class="12u$">
                    <textarea name="content" id="content" placeholder="Enter your message" rows="6" required></textarea>
                </div>
                <p></p>
                <footer>
                    <ul class="actions">
                        <li>
                            <input type="submit" value="Add new blog">
                        </li>                 
                    </ul>
                </footer>
            </article>
        </form>
        </div>

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