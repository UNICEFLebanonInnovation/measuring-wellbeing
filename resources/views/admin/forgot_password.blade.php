@extends('admin.layout.login_app')

@section('title',"Forgot Password")


@section('content')
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--forget-password m-login--2 m-login-2--skin-3" id="m_login">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#">
						<img width="400" height="300" src="{{ url('/public') }}/images/inter-agency-web-big-2.JPG" />
					</a>
				</div>
				<div class="m-login__forget-password">
					<div class="m-login__head">
						<h3 class="m-login__title">Forgotten Password ?</h3>
						<div class="m-login__desc">Enter your email to reset your password:</div>
					</div>
					<form class="m-login__form m-form" id="forgot" action="{{ url('send-forgot-password-link') }}" method="post">
						@include('admin.layout.flash')
						@csrf
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Email" value="{{ old('email') }}" name="email" id="m_email" autocomplete="off">
							@if ($errors->has('email'))
			                  	<span class="m-form__help">{{ $errors->first('email') }}</span>
			              	@endif
						</div>
						<div class="m-login__form-action">
							<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
							<a href="{{ url('login') }}" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Cancel</a>
							{{-- <button id="m_login_forget_password_cancel" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Cancel</button> --}}
						</div>
					</form>
				</div>
				<div class="m-login__account">
					<span class="m-login__account-msg">
						Already Have an account ?
					</span>&nbsp;&nbsp;
					<a href="{{ url('login') }}" class="m-link m-link--light m-login__account-link">Signin</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script type="text/javascript">
   $(document).ready(function(){
      $("#forgot").validate({
         rules:{
            email:{
               required:true,
               email:true,
            },
         },
         messages:{
            email:{
               required:"Please enter your email",
               email:"Please enter your valid email",
            },
         }
      })
   });
</script>
@endsection