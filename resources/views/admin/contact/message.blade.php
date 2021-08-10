@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                    
            <h4> Contact Messages</h4>
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
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="15%"> Email</th>
                                <th scope="col" width="25%"> Subject</th>
                                <th scope="col" width="25%"> Message</th>
                                <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($messages as $message)
                                <tr>
                                <th scope="row">{{ isset($i) ? $i++ : ''}}</th>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                <td>
                                    <a href="{{ url('/message/delete/'.$message->id) }}" onclick="return confirm('Are You sure to delete?')" class="btn btn-danger">Delete</button>
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
