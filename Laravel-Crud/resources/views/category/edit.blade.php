@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="{{url('category')}}" class="btn btn-danger float-end">Edit</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="m-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="m-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{!!$category->description!!}}</textarea>
                            @error('description')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="m-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{$category->status == 1 ? 'checked':''}}
                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="mr-3 mt-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection