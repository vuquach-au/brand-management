<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category <b></b>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header">
                            All Category
                        </div>
                   




                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cat)
                                <tr>
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->user->name }}</td>
                                <td>
                                    @if($cat->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('category/edit/'.$cat->id) }}" class="btn btn-info">Edit</button>
                                    <a style="margin-left: 2px"  href="{{ url('/SoftDeletes/category/'.$cat->id) }}" class="btn btn-danger">Delete</button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{ $categories->links() }}
                        
                    </div>
                </div>

                <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Category</div>
                                <div class="card-body">
                                    <form action="{{ route('store.category') }}" method="POST">
                                    @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Add Category</button>
                                        </form>
                                </div>
                            </div>
                </div>
            </div>
        </div>

<!--================Trash Categories=======================-->


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header">
                            Trashed Category
                        </div>
                   




                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trashCat as $cat)
                                <tr>
                                <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->user->name }}</td>
                                <td>
                                    @if($cat->created_at == NULL)
                                    <span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('category/restore/'.$cat->id) }}" class="btn btn-info">Restore</button>
                                    <a href="{{ url('pdelete/category/'.$cat->id) }}" class="btn btn-danger">P Delete</button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{ $trashCat->links() }}
                        
                    </div>
                </div>

                
            </div>
        </div>



<!--================END Trash Categories=======================-->



































    </div>
</x-app-layout>
