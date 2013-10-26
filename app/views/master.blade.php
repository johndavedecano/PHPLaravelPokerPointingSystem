<!DOCTYPE html>
<html>
    <head>
    	<title>Poker Membership</title>
        <link rel="stylesheet" href="{{ URL::to('assets/css/uikit.almost-flat.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css') }}" />
    @foreach($csheets as $csheet)
    <link rel="stylesheet" href="{{ $csheet }}" />    
    @endforeach
    	<script src="{{ URL::to('assets/js/libraries/jquery.js') }}"></script>
    	<script src="{{ URL::to('assets/js/libraries/uikit.min.js') }}"></script>
    @foreach($scripts as $script)
    <script src="{{ $script }}"></script>
    @endforeach
    </head>
    <body>
    <!--- NAVIGATION STARTS -->
    <nav class="uk-navbar">
        <div class="uk-container uk-container-center">
            <a href="#my-id" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            <a class="uk-navbar-brand uk-hidden-small" href="{{ URL::to('/') }}">Poker Points</a>
        	<ul class="uk-navbar-nav uk-hidden-small">
        		<li><a href="{{ URL::to('/') }}">Dashboard</a></li>
        	</ul>
			<div class="uk-navbar-flip">
            <ul class="uk-navbar-nav">
            <li class="uk-parent" data-uk-dropdown="">
            	<a href=""><i class="uk-icon-chevron-down"></i> Hi, User</a>
            	<div class="uk-dropdown uk-dropdown-navbar">
            		<ul class="uk-nav uk-nav-navbar">
            			<li><a href="{{ URL::to('auth/logout') }}">Edit Profile</a></li>
            			<li><a href="{{ URL::to('profile') }}">Logout</a></li>
            		</ul>
            	</div>
            </li>
            </ul>
			</div>
        </div>
    </nav>
    <!--- NAVIGATION ENDS --->
    <div class="uk-container uk-container-center uk-margin-top">
    	<div class="uk-grid" data-uk-grid-margin="">
            @include('partials.sidebar')
            <div class="tm-main uk-width-medium-3-4">
            <h3 class="uk-display-block uk-align-left"><i class="uk-icon-{{ $page_icon }}"></i> {{ $page_title }}</h3>
            @yield('content')
            </div>
    	</div>
    </div>
    <div id="my-id" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
        	<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
        		<li><a href="{{ URL::to('/') }}">Dashboard</a></li>
        		<li><a href="{{ URL::to('members') }}">Members</a></li>
                <li><a href="{{ URL::to('levels') }}">Levels</a></li>
                <li><a href="{{ URL::to('blinds') }}">Blinds</a></li>
                <li><a href="{{ URL::to('users') }}">Users</a></li>
                <li><a href="{{ URL::to('reports') }}">Reports</a></li>
                <li><a href="{{ URL::to('settings') }}">Settings</a></li>
            </ul>
        </div>
    </div>
	</body>
</html>