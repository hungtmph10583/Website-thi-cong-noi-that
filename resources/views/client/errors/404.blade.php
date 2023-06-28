@extends('layouts.client.main')
@section('title', 'Error 404')
@section('content')
            <div class="m-grid__item m-grid__item--fluid m-grid  m-error-1" style="background-image: url({{ asset('client-theme/assets/app/media/img//error/bg1.jpg')}});">
				<div class="m-error_container">
					<span class="m-error_number">
						<h1>404</h1>
					</span>
					<p class="m-error_desc">
						OOPS! Something went wrong here
					</p>
				</div>
			</div>
@endsection