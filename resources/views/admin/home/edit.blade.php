@extends('admin.admin_master')
@section('admin')


<div class="col-lg-12">
            <div class="card card-default">
                        
                <div class="card-header card-header-border-bottom">
                    <h2>Update HomeAbout</h2>
                </div>
                <div class="card-body">
                <form action="{{ url('/about/update/'.$homeabout->id) }}" method="POST">
                                    @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1"> Title</label>
                            <input type="text" value="{{ $homeabout->title }}" class="form-control" name="title" id="exampleFormControlInput1" placeholder="About Title">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Short Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_desc">{{ $homeabout->short_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Long Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_desc">{{ $homeabout->long_desc }}</textarea>
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update HomeAbout</button>
                        </div>
                    </form>
                </div>
            </div>

            
            
        </div>
@endsection