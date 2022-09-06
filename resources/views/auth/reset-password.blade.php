@extends('frontend.frontend_master')

@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ route('login') }}">Login</a></li>
				<li><a href="{{ route('password.request') }}">ForgetPassword</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">

    <h4 class="">Reset Password</h4>
	<p class="">Type your new password.</p>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" :value="old('email', $request->email)" required autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
		<div class="form-group">
		    <label class="info-title" for="email">New Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password" id="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
		<div class="form-group">
		    <label class="info-title" for="email">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	</form>					
</div>
<!-- Forget Password -->

</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection