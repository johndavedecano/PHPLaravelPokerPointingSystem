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
		<label class="uk-form-label" for="form-h-it">Department</label>
		<div class="uk-form-controls">
            <select name="group" id="group" class="required">
                @foreach($groups as $group)
                @if($user->group->id == $group->id)
                    <option selected="selected" value="{{ $group->id }}">{{ ucwords($group->name) }}</option>
                @else
                    <option value="{{ $group->id }}">{{ ucwords($group->name) }}</option>
                @endif
                @endforeach
            </select>
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Email</label>
		<div class="uk-form-controls">
			<input type="email" id="email" placeholder="" class="uk-form-width-medium required" name="email" value="{{ $user->email }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Password</label>
		<div class="uk-form-controls">
			<input type="password" id="password" placeholder="" class="uk-form-width-medium" name="password">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Password Confirmation</label>
		<div class="uk-form-controls">
			<input type="password" id="password_confirmation" placeholder="" class="uk-form-width-medium" name="password_confirmation" data-equalto="#password">
		</div>
	</div>

	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">First Name</label>
		<div class="uk-form-controls">
			<input type="text" id="first_name" placeholder="John" class="uk-form-width-medium required" name="first_name" value="{{ $user->first_name }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Last Name</label>
		<div class="uk-form-controls">
			<input type="text" id="last_name" placeholder="Doe" class="uk-form-width-medium required" name="last_name" value="{{ $user->last_name }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Gender</label>
		<div class="uk-form-controls">
            <select name="gender" id="gender">
                @if($user->gender == 'male')
                    <option selected="selected" value="male">Male</option>  
                @else
                    <option value="male">Male</option>
                @endif
                @if($user->gender == 'female')
                    <option selected="selected" value="female">Female</option>
                @else
                    <option value="female">Female</option>
                @endif 
            </select>
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Date of Birth</label>
		<div class="uk-form-controls">
			<input type="text" id="dob" placeholder="" class="uk-form-width-medium datepicker required" name="dob" value="{{ $user->dob }}">
		</div>
	</div> 
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Phone</label>
		<div class="uk-form-controls">
			<input type="text" id="phone" placeholder="" class="uk-form-width-medium" name="phone" value="{{ $user->phone }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Skype</label>
		<div class="uk-form-controls">
			<input type="text" id="skype" placeholder="" class="uk-form-width-medium" name="skype" value="{{ $user->phone }}">
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Status</label>
		<div class="uk-form-controls">
            <select name="status" id="status">
                @if($user->activated == 1)
                    <option value="1" selected>Active</option>
                @else
                    <option value="1">Active</option>
                @endif
                @if($user->activated == 0)
                   <option value="0" selected>Inactive</option>
                @else
                    <option value="0">Inactive</option>
                @endif 
            </select>
		</div>
	</div>
    
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-h-it">Photo</label>
		<div class="uk-form-controls">
			<input type="file" id="photo" placeholder="" class="uk-form-width-medium" name="photo">
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
            <button class="uk-button uk-button" type="button" onclick="window.location = '/users'" data-uk-button>Back To Users</button>
		</div>
	</div>
    
    
</form>
@stop