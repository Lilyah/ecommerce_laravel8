@extends('frontend.frontend_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <img src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/user_images/no_image.jpg') }}" class="card-img-top" style="border-radius:50%; height:100%; width:100%; margin-top:10%; margin-bottom:10%">
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div><!--/.col-md-2-->

            <div class="col-md-2">

            </div><!--/.col-md-2-->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Update Your Profile</span></h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf 

                            <div class="form-group">
	    	                    <label class="info-title" for="name">Name</label>
	    	                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
	  	                    </div>

                            <div class="form-group">
	    	                    <label class="info-title" for="email">Email</label>
	    	                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
	  	                    </div>

                            <div class="form-group">
	    	                    <label class="info-title" for="phone">Phone</label>
	    	                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
	  	                    </div>

                            <div class="form-group">
	    	                    <label class="info-title" for="profile_photo_path">User Image</label>
	    	                    <input type="file" class="form-control" name="profile_photo_path">
	  	                    </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    Update
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div><!--/.col-md-8-->

            <div class="col-md-2">

            </div><!--/.col-md-2-->

        </div><!--/.row-->
    </div>

</div>


@endsection