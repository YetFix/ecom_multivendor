@extends('admin.layouts.layout')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card ">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update Admin Details</h4>
             
              <form class="forms-sample" action="{{url('admin/update-admin-details')}}" method="post">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                  <label for="username">Admin Username/Email</label>
                  <input type="text" class="form-control" id="username" value="{{$admin['email']}}" readonly placeholder="Username">
                </div>
                <div class="form-group">
                  <label for="type">Admin Type </label>
                  <input type="text" class="form-control" id="type" value="{{$admin['type']}}" readonly placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="name">Admin Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{Auth::guard('admin')->user()->name}}" required placeholder="Enter admin name">
                  <span id="check"></span>
                </div>
                <div class="form-group">
                    <label for="mobile">Admin Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{Auth::guard('admin')->user()->mobile}}" maxlength="11" minlength="11" required placeholder="New Password">
                  </div>
               
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/admin/dashboard" class="btn btn-light">Cancel</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    
    </div>
    @include('admin.layouts.footer')
@endsection