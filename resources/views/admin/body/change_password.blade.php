@extends('admin.admin_master')
@section('admin')




<div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form-pill" method="post" action="{{ route('password.update') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Current Password</label>
                    <input type="text" class="form-control" id="current_password" name="oldpassword" placeholder="Current Password">
                    @error('oldpassword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">New Password</label>
                    <input type="password" id="password" class="form-control" name="password"  placeholder="New Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"  placeholder="Confirm New Password">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-default">Save</button>
            </form>
        </div>
    </div>
@endsection