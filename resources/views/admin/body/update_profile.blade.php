@extends('admin.admin_master')
@section('admin')

<div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card-body">
            <form class="form-pill" method="post" action="{{ route('update.user.profile') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Name</label>
                    <input type="text" class="form-control"  name="name" value="{{ $user['name'] }}" 
                    placeholder="Current Password">
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">User Email</label>
                    <input type="text" class="form-control"  name="email" value="{{ $user['email'] }}">
                    
                </div>
                
                <button type="submit" class="btn btn-primary btn-default">Update</button>
            </form>
        </div>
    </div>
@endsection