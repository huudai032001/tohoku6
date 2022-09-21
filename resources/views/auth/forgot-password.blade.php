@extends('admin.layouts.base')

@section('title', 'Forgot password')

@section('body-classes', 'bg-secondary')

@section('body')
    <!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Password recovery form -->
					<form class="login-form" action="index.html">
						<div class="card mb-0">
							<div class="card-body">
								<div class="text-center mb-3">
									<i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Password recovery</h5>
									<span class="d-block text-muted">We'll send you instructions in email</span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-right">
									<input type="email" class="form-control" placeholder="Your email">
									<div class="form-control-feedback">
										<i class="icon-mail5 text-muted"></i>
									</div>
								</div>

								<button type="submit" class="btn btn-primary btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
							</div>
						</div>
					</form>
					<!-- /password recovery form -->

				</div>
				<!-- /content area -->


			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
@endsection