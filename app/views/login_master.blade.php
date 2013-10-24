<!DOCTYPE html>
<html>
    <head>
    	<title>Poker Membership</title>
    	<link rel="stylesheet" href="{{ URL::to('assets/css/uikit.almost-flat.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css') }}" />
    	<script src="{{ URL::to('assets/js/libraries/jquery.js') }}"></script>
    	<script src="{{ URL::to('assets/js/libraries/uikit.min.js') }}"></script>
        <script src="{{ URL::to('assets/js/login.js') }}"></script>
    </head>
    <body>
        @yield('content')
	</body>
</html>