@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                    
            <h4>Home Contact</h4>
            <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>
                <div class="col-md-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <div class="card">

                        
                        <div class="card-header">All Contact Data</div>
                   

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" width="5%">SL No</th>
                                <th scope="col" width="15%">Contact Phone</th>
                                <th scope="col" width="15%">Contact Email</th>
                                <th scope="col" width="25%">Contact Address</th>
                                <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($contacts as $contact)
                                <tr>
                                <th scope="row">{{ isset($i) ? $i++ : ''}}</th>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>
                                    <a href="{{ url('/contact/edit/'.$contact->id) }}" class="btn btn-info">Edit</button>
                                    <a style="margin-left: 2px" href="{{ url('/contact/delete/'.$contact->id) }}" onclick="return confirm('Are You sure to delete?')" class="btn btn-danger">Delete</button>
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
