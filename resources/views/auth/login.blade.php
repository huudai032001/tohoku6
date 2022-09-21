@extends('auth.layout')

@section('body-classes', 'bg-secondary')

@section('body')
    
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-start">

					<!-- Login form -->
					<form class="login-form" action="" method="POST">
						@csrf
						@if (request()->filled('redirect'))
							<input type="hidden" name="redirect" value="{{ request()->input('redirect') }}">
						@endif
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-lock5 icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h1 class="mb-0">{{ __('Login') }}</h1>									
								</div>								

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" class="form-control" placeholder="{{ __('Username') }}" name="login_id" required autocomplete="off">
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" class="form-control" placeholder="{{ __('Username') }}" name="password" required autocomplete="off">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<div class="form-check form-check-inline">
										<input type="checkbox" class="form-check-input" id="login_remember" name="remember" value="1">
										<label class="form-check-label" for="login_remember">
											{{ __('Keep logged in') }}
										</label>
									</div>
								</div>

								@if (session()->has('login_error') || $errors->any())
									<div class="form-group">
										<div class="alert alert-danger">
											{{ session('login_error') }}
										</div>
									</div>
								@endif
								

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }}</button>
								</div>								

								{{-- <div class="text-center">
									<a href="/forgot-password">Forgot password?</a>
								</div> --}}
							</div>
						</div>
					</form>
					<!-- /login form -->

				</div>
				<!-- /content area -->
				

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

@endsection