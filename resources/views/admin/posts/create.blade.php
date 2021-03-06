@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Create New Post
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="title">Post title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="body">Post content</label>
            <textarea class="form-control" name="body" id="body" > {{old('body')}} </textarea>
        </div>
        <div class="form-group">
            <label for="path_img">Post image</label>
            <input class="form-
            control" type="file" name="path_img" id="path_img" accept="image/*" >
        </div>
        
        <input class="btn btn-primary" type="submit" value="Create Post">
    </form>
</div>
@endsection
