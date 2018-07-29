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
                    <li><a href="#">Profile</a></li>
                    <li><a href="{!! url('myblog') !!}">{{ Auth::user()->name }}</a></li>
                    <li><a href="#">New Blog</a></li>
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
        @foreach ($sub as $subs)
        <form class="form-horizontal" method="POST" action="{{ url('/myblog/edit') }}" enctype="multipart/form-data">
            <input type='hidden' value="{!! csrf_token() !!}" name='_token' />
            <article class="post">
                <header>
                    <div class="12u$ title">
                        <h2>Subject</h2>
                        <input type="text" name="subject" id="subject" value="{{ $subs->subject }}" placeholder="Subject">
                    </div>
                </header>
                @if ($subs->url != NULL)
                <a href="#" class="image featured"><img src="{{ '../../images/' . $subs->url }}" alt="" /></a>
                @endif
                <p style="margin-bottom: 1px;margin-top:-30px;">Update picture</p>
                <input type="file" name="file" id="file"/>
                <div class="form-group user-info-detail" style="display: none">
                    <label for="id" class="col-md-4 control-label">ID</label>
                    <div class="col-md-6">
                        <input id="id" type="number" class="form-control" name="id" value="{{ $subs->id }}">
                    </div>
                </div>
                <div class="12u$">
                    <textarea name="content" id="content" placeholder="Enter your message" rows="6">{{ $subs->content }}</textarea>
                </div>
                <p>  </p>
                <footer>
                    <ul class="actions">
                        <li>
                            <input type="submit" value="Edit">
                        </li>                 
                    </ul>
                </footer>
            </article>
        </form>
        @endforeach

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