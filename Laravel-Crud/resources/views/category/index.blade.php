@extends('layouts.frontend')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categories List
                        <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <!-- burada hata mesajını kodladım-->
                @session('status')
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endsession

                <div class="card">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead> <!--foreach döngüsü sayesinde var category modelimizde bulunan id,name,description,status verilerini veritabanında gösterdim-->
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->status == 1 ?'Visible':'Hidden'}}</td>
                                <td>
                                    <!--burada ihtiyaç dogrultusunda sayfamda edit,show,delete işlemi olursa category controllerımdan verileri çekerek işlem yapabilirim-->
                                    <a href="{{'category.edit',$category->id}}" class="btn btn-primary">Edit</a>
                                    <a href="{{'category.show',$category->id}}" class="btn btn-success">Show</a>

                                    <form action="{{route('category.destroy',$category->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>






@endsection