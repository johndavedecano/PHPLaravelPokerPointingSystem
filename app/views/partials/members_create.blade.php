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
		<label class="uk-form-label" for="form-h-it">First Name</label>
		<div class="uk-form-controls">
			<input type="text" id="first_name" placeholder="John" class="uk-form-width-medium required" name="first_name">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Last Name</label>
		<div class="uk-form-controls">
			<input type="text" id="last_name" placeholder="Doe" class="uk-form-width-medium required" name="last_name">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Gender</label>
		<div class="uk-form-controls">
            <select name="gender" id="gender">
            	<option value="male">Male</option>
                <option value="female">Female</option>
            </select>
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Date of Birth</label>
		<div class="uk-form-controls">
			<input type="text" id="dob" placeholder="" class="uk-form-width-medium datepicker" name="dob">
		</div>
	</div> 
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Address</label>
		<div class="uk-form-controls">
			<textarea id="address" placeholder="" class="uk-form-width-medium" name="address"></textarea>
		</div>
	</div> 
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Email</label>
		<div class="uk-form-controls">
			<input type="email" id="email" placeholder="" class="uk-form-width-medium email" name="email">
		</div>
	</div> 
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Phone</label>
		<div class="uk-form-controls">
			<input type="text" id="phone" placeholder="" class="uk-form-width-medium" name="phone">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Skype</label>
		<div class="uk-form-controls">
			<input type="text" id="skype" placeholder="" class="uk-form-width-medium" name="skype">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Photo</label>
		<div class="uk-form-controls">
			<input type="file" id="photo" placeholder="" class="uk-form-width-medium" name="photo">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Membership Level</label>
		<div class="uk-form-controls">
			<select name="level_id" class="uk-form-width-medium">
                @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ ucwords($level->name) }}</option>
                @endforeach
            </select>
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Initial Points</label>
		<div class="uk-form-controls">
			<input type="number" id="points" placeholder="" class="uk-form-width-medium" name="points">
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
            <button class="uk-button uk-button" type="button" onclick="window.location = '/members'" data-uk-button>Back To Members</button>
		</div>
	</div>
    
    
</form>
@stop