@extends('frontend.frontend_master')

@section('content')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ route('login') }}">Login</a></li>
				<li class='active'>Forget Password</li>
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

    <h4 class="">Forget Password</h4>
	<p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

		<div class="form-group">
		    <label class="info-title" for="email">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" name="email" id="email" :value="old('email')" required autofocus>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send</button>
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