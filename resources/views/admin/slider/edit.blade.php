@extends('admin.admin_master')
@section('admin')
    <div class="col-lg-12">
                            <div class="card">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                                <div class="card-header">Update Slider</div>
                                <div class="card-body">
                                    <form action="{{ url('/slider/update/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slider Title</label>
                                                <input type="text" name="slider_title" value="{{ $slider->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slider Description</label>
                                                <textarea  name="slider_desc" row="3" class="form-control" aria-describedby="emailHelp">
                                                {{ $slider->description }}
                                                </textarea>
                                                @error('slider_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slider Image</label>
                                                <input type="file" name="slider_image" value="{{ asset($slider->image) }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset($slider->image)}}" style="height: 200px; width:400px"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update slider</button>
                                        </form>
                                </div>
                            </div>
                </div>
    
@endsection
