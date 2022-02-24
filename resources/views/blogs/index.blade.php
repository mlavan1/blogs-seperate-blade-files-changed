@extends('blogs.layout')
 
@section('content')

{{-- Category Registration Part --}}


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create new Category</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Category Name</th>     
            <th width="250px">Action</th>
        </tr>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $blog->category_name }}</td>
            <td>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('blogs.show',$blog->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $blogs->links() !!}
      
{{-- Book Registration part --}}

    <br><br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Insert Book Details</h2>
            </div>
        </div>
    </div>
   
    {{-- @if ($message1 = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message1 }}</p>
        </div>
    @endif --}}
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Name</strong>
                <input type="text" name="book_name" class="form-control" placeholder="Book Name"><br>
                <strong>Category</strong>
                <input type="text" name="book_category" class="form-control" placeholder="Book Category"><br>
                <strong>Author</strong>
                <input type="text" name="book_author" class="form-control" placeholder="Book Author"><br>
                <strong>Price</strong>
                <input type="text" name="book_price" class="form-control" placeholder="Book Price"><br>
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  
    {!! $blogs->links() !!}
      
@endsection