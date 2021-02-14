@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        {{$post->title}}
    </h1>
        <article class="mb-5">
            <h2>
                {{$post->title}}
            </h2>
                <div class="info">
                    By {{$post->user->name}}
                    <div class="date">
                        {{$post->updated_at->diffForHumans()}}
                    </div>
                </div>
        </article>
</div>
@endsection
