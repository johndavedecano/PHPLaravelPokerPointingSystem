@extend('master')
@section('content')

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

@if($errors->count() > 0)
    <div class="uk-alert uk-alert-danger" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        <h4>Warning!</h4>
        @foreach($errors->all() as $message)
        {{ $message }}<br>
        @endforeach
    </div><!--alert-->
@endif

<div class="uk-clearfix"></div>

<form class="uk-form uk-form-horizontal" action="{{ Request::url() }}" data-validate="parsley" id="form" method="POST" enctype="multipart/form-data">
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Level Name</label>
		<div class="uk-form-controls">
			<input type="text" id="name" placeholder="Level Name e.g Gold" class="uk-form-width-medium required" name="name" value="{{ $level->name }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Conversion</label>
		<div class="uk-form-controls">
			<input type="number" id="conversion" placeholder="" class="uk-form-width-medium required" name="conversion" value="{{ $level->conversion }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<div class="uk-form-controls uk-text-left">
		</div>
	</div>
    
	<div class="uk-form-row">
		<div class="uk-form-controls uk-text-left">
            <input class="uk-button uk-button-primary" type="submit"  value="Submit">
            <button class="uk-button uk-button" type="reset" data-uk-button>Reset</button>
            <button class="uk-button uk-button" type="button" onclick="window.location = '/levels'" data-uk-button>Back To Levels</button>
		</div>
	</div>
    
</form>
@stop