@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tag List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">Tag List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

    <!-- Main content -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Tag List</h3>
                    <a href="{{route('tag.create')}}" class="btn btn-primary">Create Tag</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th style="width: 40px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($tags->count())
                    
                  @foreach ($tags as $tag)
                    <tr>
                      <td>{{$tag->id}}</td>
                      <td>{{$tag->name}}</td>
                      <td>{{$tag->slug}}</td>
                      <td class="d-flex">
                        <a href="{{route('tag.edit', [$tag->id])}}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                        <form action="{{route('tag.destroy', [$tag->id])}}" class="mr-1" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        {{-- <a href="{{route('category.show', [$category->id])}}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a> --}}
                      </td>
                    </tr>
                  @endforeach
                  @else
                    <tr>
                      <td colspan="4">
                        <h5 class="text-center">No tags found.</h5>
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

@endsection