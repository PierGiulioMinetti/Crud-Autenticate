@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        {{$post->title}}
    </h1>
        <article class="mb-5">
            
            <p>
                {{$post->body}}
            </p>
                <div class="info">
                    By {{$post->user->name}}

                    @if (!empty($post->path_img))
                        
                        <img src="{{asset('storage/' . $post->path_img)}}" alt="{{$post->name}}">

                    @else
                        <p>
                            No image available yet!
                        </p>
                    @endif

                    <div class="date">
                        {{$post->updated_at->diffForHumans()}}
                    </div>
                </div>
        </article>
</div>
@endsection
