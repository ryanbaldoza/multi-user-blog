@extends('layouts.app')
@section('content')

<main>
    <div class="jumbotron">
        <div class="container">
            <div class="col-sm-8">
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->role->name }}</p>
                @if ($user->blog->count() > 0) <button class="btn btn-primary btn-xs">{{ $user->blog->count() }} Blogs</button> @endif
            </div>
            <div class="col-sm-4">
            <br><br>
                <img class="img-circle" height="100" width="100" src="/images/{{ $user->photo ? $user->photo->photo : 'default.png' }}" alt="">
            </div>
        </div>
    </div>

    <div class="col-sm-7">
           @if ($user->blog->count() > 0)
               <h1>Latest Blogs by <small><a href="{{ route('users.show', $user->username) }}">{{ $user->name }}</a></small></h1>
               <hr>
               @foreach ($user->blog->reverse() as $blog)
                   <h2><a href="{{ action('BlogController@show', [$blog->slug]) }}">{{ $blog->title }}</a></h2>
                   {!! str_limit($blog->body, 200) !!} <a href="{{ action('BlogController@show', [$blog->slug]) }}">Read more</a>

                   <p>
                    Posted <strong>{{ $blog->created_at->diffForHumans() }}</strong> 

                    @if ($blog->category)
                         @foreach ($blog->category as $category) <i class="fa fa-btn fa-cubes"></i> <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a> @endforeach
                     @endif 
                    </p>
               @endforeach
           @endif
        </div>

        <div class="col-sm-5">
            @include('partials.user-sidebar')
        </div>

</main>


@endsection
