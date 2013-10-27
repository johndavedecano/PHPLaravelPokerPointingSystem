<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">

	<ul class="uk-nav uk-nav-side" data-uk-nav="">
    
		<li class="uk-nav-header"><i class="uk-icon-group"></i> Members</li>
		<li><a href="{{ URL::to('members') }}">All Members</a></li>
        <li><a href="{{ URL::to('members/create') }}">Add Member</a></li>
        <li><a href="{{ URL::to('members/search') }}">Search</a></li>
        
        <li class="uk-nav-header"><i class="uk-icon-signal"></i> Levels</li>
        <li><a href="{{ URL::to('levels') }}">All Levels</a></li>
        <li><a href="{{ URL::to('levels/create') }}">Add Level</a></li>
        
        <li class="uk-nav-header"><i class="uk-icon-eye-open"></i> Blinds</li>
        <li><a href="{{ URL::to('blinds') }}">All Blinds</a></li>
        <li><a href="{{ URL::to('blinds') }}">Add Blind</a></li>
        
        <li class="uk-nav-header"><i class="uk-icon-user"></i> Users</li>
        <li><a href="{{ URL::to('users') }}">All Users</a></li>
        <li><a href="{{ URL::to('users/create') }}">Add User</a></li>
        
        <li class="uk-nav-header"><i class="uk-icon-envelope"></i> Announcements</li>
        <li><a href="{{ URL::to('users') }}">All Announcements</a></li>
        <li><a href="{{ URL::to('users/create') }}">Compose</a></li>
        
        <li class="uk-nav-header"><i class="uk-icon-cog"></i> Settings</li>
        <li><a href="{{ URL::to('settings') }}">General</a></li>
        <li><a href="{{ URL::to('settings') }}">Email Templates</a></li>
        <li><a href="{{ URL::to('reports') }}">Reports</a></li>

        
	</ul>
</div>