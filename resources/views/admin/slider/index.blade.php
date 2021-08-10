@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                    
            <div class="col-md-12">
            <h3 align="center">Home Slider</h3>
                <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <div class="card">

                        
                        <div class="card-header">All Sliders</div>
                   

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%">SL No</th>
                                <th scope="col" width="15%">Slider Title</th>
                                <th scope="col" width="15%">Slider Image</th>
                                <th scope="col" width="35%">Description</th>
                                <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($sliders as $slider)
                                <tr>
                                <th scope="row">{{ isset($i) ? $i++ : ''}}</th>
                                <td>{{ $slider->title }}</td>
                                <td><img src="{{ asset($slider->image) }}" style="height: 40px; width: 70px"/></td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <a href="{{ url('/slider/edit/'.$slider->id) }}" class="btn btn-info" >Edit</button>
                                    <a style="margin-left: 2px" href="{{ url('/slider/delete/'.$slider->id) }}" onclick="return confirm('Are You sure to delete?')" class="btn btn-danger">Delete</button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                        
                    </div>
                </div>

                
            </div>
        </div>



    </div>
@endsection
