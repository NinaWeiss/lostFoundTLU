<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" >
		<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>

        <title>{{ config('app.name', 'Laravel') }}</title>

    </head>

	<body class="is-preload">
        <!-- Wrapper -->
        <div id="wrapper">
            <!-- Main -->
            <div id="main">
                <div class="inner">
                    
                    <!-- Header -->
                    <header id="header">
                        <img src="{{ asset('/images/logo.svg') }}" alt="logo">
                    </header>
                    @if(Auth::check())
                        <div class="admin-menu">
                            <form action="{{ route('logout') }}" method="post" style="margin-top: 20px;">
                                @csrf
                                <input type="submit" value="Logi välja">
                            </form>
                        </div>
                    @endif

                    <!-- Section -->
                    @if(Auth::check())
                        <section style="padding: 0 0 1em 0;">
                        @else
                        <section style="padding: 3em 0 1em 0;">
                    @endif
                        <x-nav-component :currentPage="$currentPage" />

                        @yield('content')

                    </section>

                    <!-- Section -->
                    <section>
                        <header class="major major-heading">
                            <h2>Kontakt</h2>
                        </header>
                        <div class="footer-wrap">
                            <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper
                                dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="contact">
                                <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
                                <li class="icon solid fa-phone">(000) 000-0000</li>
                            </ul>
                        </div>
                    </section>

                    <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">&copy;{{ date('Y') }} All rights reserved. </p>
                    </footer>

                </div>
            </div>
            <!-- Sidebar -->
            @if ($currentPage =='found' || $currentPage == 'lost')
                <x-sidebar-component :categories="$categories" :currentPage="$currentPage" />               
            @endif

        </div>

        <div id="overlay" class="overlay"></div>
        <div id="modal" class="modal">
            <p class="close-button" id="close-button">✖</p>
            <div class="show-post" id="show-post"></div>
        </div>
        <div class="small-modal" id="small-modal">
            <p class="close-button" id="close-button2">✖</p>
            <div class="show-post" id="show-post2"></div>
        </div>
			<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
			<script src="{{ asset('js/browser.min.js') }}" type="text/javascript"></script>
			<script src="{{ asset('js/breakpoints.min.js') }}" type="text/javascript"></script>
			<script src="{{ asset('js/util.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
	</body>
</html>