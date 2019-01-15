@extends('shop.main')
@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ $page->slug }}">{{ $page->title }}</a></li>
            </ol>
        </nav>
        <h1>{{ $page->title }}</h1>
        <hr>
        {!! $page->content !!}
    </div>

@endsection