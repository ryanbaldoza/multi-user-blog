@extends('layouts.app')
@section('content')

@include('partials.tinymce')

<main class="container-fluid">

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Create a blog post</h1>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            {!! Form::open(['method' => 'POST', 'action' => 'BlogController@store', 'files' => true]) !!}
                <div class="form-group">
                    @include('partials.error-message')
                    {!! Form::label("title", "Title:") !!}
                    {!! Form::text("title", null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("body", "Body:") !!}
                    {!! Form::textarea("body", null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("photo_id", "Featured Image:") !!}
                    {!! Form::file("photo_id", ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("category_id", "Category:") !!}
                    {!! Form::select("category_id[]", $categories, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("meta_desc", "Meta Description:") !!}
                    {!! Form::text("meta_desc", null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

</main>

@include('partials.select-2-script')

@endsection

