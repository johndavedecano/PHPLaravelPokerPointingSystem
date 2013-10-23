<!DOCTYPE html>
<html>
    <head>
    	<title>Poker Membership</title>
    	<link rel="stylesheet" href="{{ URL::to('assets/css/uikit.almost-flat.min.css') }}" />
    	<script src="{{ URL::to('assets/js/libraries/jquery.js') }}"></script>
    	<script src="{{ URL::to('assets/js/libraries/uikit.min.js') }}"></script>
    </head>
    <body>
    <div class="uk-grid">
        @yield('content')
    </div>
	</body>
</html>