@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                    
            <div class="col-md-12">
            <h3 align="center">Home About</h3>
                <a href="{{ route('add.about') }}"><button class="btn btn-info">Add About</button></a>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <div class="card">

                        
                        <div class="card-header">All About Data</div>
                   

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%">SL No</th>
                                <th scope="col" width="15%">Home Title</th>
                                <th scope="col" width="15%">Short Description</th>
                                <th scope="col" width="35%">Long Description</th>
                                <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($homeabouts as $homeabout)
                                <tr>
                                <th scope="row">{{ isset($i) ? $i++ : ''}}</th>
                                <td>{{ $homeabout->title }}</td>
                                <td>{{ $homeabout->short_desc }}</td>
                                <td>{{ $homeabout->long_desc }}</td>
                                <td>
                                    <a href="{{ url('/about/edit/'.$homeabout->id) }}" class="btn btn-info">Edit</button>
                                    <a style="margin-left: 2px" href="{{ url('/about/delete/'.$homeabout->id) }}" onclick="return confirm('Are You sure to delete?')" class="btn btn-danger">Delete</button>
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
