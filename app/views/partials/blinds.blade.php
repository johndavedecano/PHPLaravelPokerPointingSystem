@extend('master')
@section('content')
<a class="uk-button uk-align-right" href="{{ URL::to('blinds/create') }}"><i class="uk-icon-plus-sign"></i> Add Blind</a>
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
            <th>Name</th>
			<th>Conversion</th>
            <th></th>
		</tr>
	</thead>
	<tbody>
    @if(!empty($blinds))
    @foreach($blinds as $blind)
		<tr>
			<td>{{ ucwords($blind->name) }}</td>
            <td>{{ $blind->conversion }}</td>
            <td>
                <a href="{{ URL::to('blinds/update/'.$blind->id) }}" class="uk-button"><i class="uk-icon-pencil"></i></a>
                <a href="#" class="uk-button delete-item" data-id="{{ $blind->id }}"><i class="uk-icon-trash"></i></a>
            </td>
		</tr>
    @endforeach
    @endif
	</tbody>
</table>
@stop