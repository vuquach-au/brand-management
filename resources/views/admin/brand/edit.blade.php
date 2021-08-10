@extends('admin.admin_master')
@section('admin')
    <div class="col-md-4">
                            <div class="card">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                                <div class="card-header">Update Brand Name</div>
                                <div class="card-body">
                                    <form action="{{ url('/brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Brand Name</label>
                                                <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('brand_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Brand Image</label>
                                                <input type="file" name="brand_image" value="{{ asset($brand->brand_image) }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('brand_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <img src="{{ asset($brand->brand_image)}}" style="height: 200px; width:400px"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Brand</button>
                                        </form>
                                </div>
                            </div>
                </div>
    
@endsection
