
@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header"><h3>All Porfolios</h3></div>
                    <div class="card-group">
                        @foreach($images as $multi)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{ asset($multi->image) }}" alt=""/>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

                <div class="col-md-4">
                         @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                            <div class="card">
                                <div class="card-header"><h2>Multi Image</h2></div>
                                <div class="card-body">
                                    <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Brand Image</label>
                                                <input type="file" name="image[]" class="form-control" multiple="" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Upload Images</button>
                                        </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>



    </div>
@endsection