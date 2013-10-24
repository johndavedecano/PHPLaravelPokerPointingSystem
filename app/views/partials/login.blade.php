@extends('login_master')
@section('content')
	<div class="uk-width-1-3 uk-container-center" id="login-wrapper">
    <h2 class="uk-align-center"><i class="uk-icon-lock"></i> Administration Panel</h2>
        <div class="uk-panel uk-panel-box" id="login-panel">
            <div class="uk-form">
            
                <div class="uk-alert uk-alert-danger" data-uk-alert="" style="display: none;" id="error-message">
                
                </div>
                
            	<div class="uk-grid">
            		<div class="uk-width-1-1">
                        <label>Email:</label>
            			<input type="email" class="uk-width-1-1 uk-form-large" id="email">
            		</div>
                    <div style="clear: both; margin-bottom:15px;"></div>
            		<div class="uk-width-1-1">
                        <label>Password:</label>
            			<input type="password" class="uk-width-1-1 uk-form-large" id="password">
            		</div>
                    <div style="clear: both; margin-bottom:15px;"></div>
            		<div class="uk-width-1-1">
                            <button class="uk-button uk-button-primary uk-button-large uk-button-expand" type="button" onclick="login()">Login</button>
                            <div style="clear: both; margin-bottom:15px;"></div>
                            <label class="uk-align-left"><input type="checkbox" name="remember" id="remember"> Remember Me</label>
                            <a href="#" class="uk-align-right uk-margin-bottom-remove">Forgot your password?</a>
            		</div>
            	</div>
            </div>
        </div>
    </div>
@stop