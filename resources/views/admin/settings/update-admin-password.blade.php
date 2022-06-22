@extends('admin.layouts.layout')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card ">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Admin Password</h4>
             
              <form class="forms-sample" action="{{url('admin/update-admin-password')}}" method="post">
                @csrf
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('err'))
                <div class="alert alert-danger" role="alert">
                  {{Session::get('err')}}
                </div>
                @endif
                <div class="form-group">
                  <label for="exampleInputUsername1">Admin Username/Email</label>
                  <input type="text" class="form-control" id="username" value="{{$admin['email']}}" readonly placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="type">Admin Type </label>
                  <input type="text" class="form-control" id="type" value="{{$admin['type']}}" readonly placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="password" class="form-control" name="current_password" id="current_password" required placeholder="Enter Current Password">
                  <span id="check"></span>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="New Password">
                  </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm New Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm Password">
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/admin/dashboard" class="btn btn-light">Cancel</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @include('admin.layouts.footer')
  </div>
@endsection