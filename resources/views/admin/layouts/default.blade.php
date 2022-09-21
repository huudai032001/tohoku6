@extends('admin.layouts.base')


@section('body')

	@include('admin.inc.nav-bar')

	<!-- Page content -->
	<div class="page-content">

		@include('admin.inc.sidebar')


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light">
					<div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h2>
								<span class="font-weight-semibold">
									@section('title')
										{{ $pageTitle ?? '' }}
									@show
								</span>
							</h2>
							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								
								@yield('page-header-buttons')
								
							</div>
						</div>
					</div>
					
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">					
					
					@include('admin.inc.flash-message')
				
					@yield('content')

				</div>
				<!-- /content area -->


			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

@endsection