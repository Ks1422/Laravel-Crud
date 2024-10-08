@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Category
                        <a href="{{url('category')}}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf

                        <div class="m-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="m-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                            @error('description')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="m-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" checked>Checked=visible, unchecked=hidden
                            @error('status')<span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="m-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection