@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        I tuoi post
    </h1>
    @if($posts->isEmpty())
       <p>
            No post available    
       </p> 
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Created
                    </th>
                    <th colspan="3">
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{$post->id}}
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            {{$post->created_at->format('d/m/Y')}}
                        </td>
                        
                        {{-- BUTTON CRUD --}}
                        <td>
                            <a href="{{route('posts.show', $post->slug)}}" class="btn btn-success">Show</a>
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
