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
		<div id="main">

			@foreach  ($contents as $content)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a id = "{{$content->id}}" href="#">{{ $content->subject }}</a></h2>
                        
                    </div>
                    <div class="meta">
                        <time class="published">{{ date('F d, Y', strtotime($content->created_at)) }}</time>
                        <a href="#" class="author"><span class="name">{{ $content->name }}</span><img src="{{ 'images/' . $content->usersUrl }}" alt="" /></a>
                    </div>
                </header>
                @if ($content->url != NULL)
                <a href="#" class="image featured"><img src="{{ 'images/' . $content->url }}" alt="" /></a>
                @endif
                <p>
                    {{ str_limit(strip_tags($content->content), 50) }}
                    @if (strlen(strip_tags($content->content)) > 50)
                      <a href="{{ url('/seemore/' . $content->id) }}" class="btn btn-info btn-sm"><p>Read More<p></a>
                    @endif
                </p>
                <footer>
                	<ul class="actions">
	                		<li>
	                			<a href="{{ url('myblog/edit/' . $content->id) }}" class="button fit">Edit</a>
	                		</li>
		                    <li>
		                    	<a onclick="return confirm('Are you sure?')" href="{{ url('myblog/delete/' . $content->id) }}" class="button fit">Delete</a> 
		            		</li>            		
                	</ul>
                </footer>
            </article>
            @endforeach
            {{ $contents->links() }}
		</div>

		<!-- Footer -->
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