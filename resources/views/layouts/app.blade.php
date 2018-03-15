<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">


    @yield('styles')

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        <div class="container">

            <div class="row">
                @if(Auth::check())

                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('home') }}">Dashboard</a></li>

                            @if(Auth::user()->admin)

                                <li class="list-group-item"><a href="{{ route('users.index') }}">All Users</a></li>
                                <li class="list-group-item"><a href="{{ route('users.create') }}">Create new User</a></li>

                                @endif


                            <li class="list-group-item"><a href="{{ route('user.profile') }}">Update Profile</a></li>


                            <li class="list-group-item"><a href="{{ route('category.index') }}">All categories</a></li>
                            <li class="list-group-item"><a href="{{ route('category.create') }}">Create new Category</a></li>

                            <li class="list-group-item"><a href="{{ route('tag.index') }}">All tags</a></li>
                            <li class="list-group-item"><a href="{{ route('tag.create') }}">Create new Tag</a></li>


                            <li class="list-group-item"><a href="{{ route('post.index') }}">All posts</a></li>
                            <li class="list-group-item"><a href="{{ route('post.create') }}">Create new post</a></li>
                            <li class="list-group-item"><a href="{{ route('post.trashed') }}">Trashed posts</a></li>

                            <li class="list-group-item"><a href="{{ route('settings') }}">Settings</a></li>

                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    @include('inc.messages')
                    @yield('content')
                </div>
            </div>
        </div>

    </main>


</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>
    @if(session('success'))

    toastr.success('{!! session('success')!!}');

    @endif

    @if(session('error'))

    toastr.info('{!! session('error')!!}');

    @endif

        @if(session('info'))

    toastr.info('{!! session('info')!!}');

    @endif

$(function() {
        $('.selectpicker').selectpicker(

        );
    });

</script>

@yield('scripts')

</body>
</html>

{{--

options for toastr

"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": true,
"positionClass": "toast-top-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut",
"escapeHtml": true--}}
