<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category <b></b>
            
        </h2>
    </x-slot>
    <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Update Category Name</div>
                                <div class="card-body">
                                    <form action="{{ url('/category/update/'.$category->id) }}" method="PATCH">
                                    @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            
                                            
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                        </form>
                                </div>
                            </div>
                </div>
    
</x-app-layout>
