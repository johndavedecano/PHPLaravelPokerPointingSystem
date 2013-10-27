@extend('master')
@section('content')
<a class="uk-button uk-align-right" href="{{ URL::to('users/create') }}"><i class="uk-icon-plus-sign"></i> Add User</a>
<div style="clear: both;"></div>
@if(Session::has('error'))
    <div class="uk-alert uk-alert-danger" data-uk-alert="">
          <a href="#" class="uk-alert-close uk-close"></a>
          {{ Session::get('error') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="uk-alert uk-alert-success" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        {{ Session::get('success') }}
    </div>
@endif
<div style="clear: both;"></div>
<table class="uk-table dynamic_table" id="dynamic_table">
	<thead>
		<tr>
            <th>Photo</th>
			<th>Name</th>
            <th>Department</th>
            <th>Last Login</th>
            <th>Status</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    @if(!empty($users))
    @foreach($users as $user)
		<tr>
            <td><img src="{{ URL::to('uploads/timthumb.php?src=') }}{{ $user->thumbnail }}&h=25&w=25"/></td>
			<td>{{ $user->fullname }}</td>
            <td>
                @if(is_object($user->group))
                    {{ $user->group->name }}
                @endif
            </td>
            <td>{{ date("F j,Y h:i A",strtotime($user->last_login)) }}</td>
            <td>
                @if($user->activated == 1)
                    <div class="uk-badge uk-badge-success">Active</div>
                @else
                    <div class="uk-badge uk-badge-danger">Inactive</div>
                @endif
            </td>
            <td>
                <a href="{{ URL::to('users/update/'.$user->id) }}" class="uk-button"><i class="uk-icon-pencil"></i></a>
                <a href="#" class="uk-button delete-item" data-id="{{ $user->id }}"><i class="uk-icon-trash"></i></a>
            </td>
		</tr>
    @endforeach
    @endif
	</tbody>
</table>
@stop