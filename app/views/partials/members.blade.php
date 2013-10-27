@extend('master')
@section('content')
<a class="uk-button uk-align-right" href="{{ URL::to('members/create') }}"><i class="uk-icon-plus-sign"></i> Add Member</a>
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
            <th>Points</th>
            <th>Last Login</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    @if(!empty($members))
    @foreach($members as $member)
		<tr>
            <td><img src="{{ URL::to('uploads/timthumb.php?src=') }}{{ $member->thumbnail }}&h=25&w=25"/></td>
			<td>{{ $member->fullname }}</td>
            <td>{{ $member->points }}</td>
            <td>{{ date("F j,Y h:i A",strtotime($member->last_login)) }}</td>
            <td>
                <a href="{{ URL::to('members/points/'.$member->id) }}" class="uk-button" data-uk-tooltip title="Manage Points"><i class="uk-icon-usd"></i></a>
                <a href="{{ URL::to('members/update/'.$member->id) }}" class="uk-button"><i class="uk-icon-pencil"></i></a>
                <a href="#" class="uk-button delete-item" data-id="{{ $member->id }}"><i class="uk-icon-trash"></i></a>
            </td>
		</tr>
    @endforeach
    @endif
	</tbody>
</table>
@stop