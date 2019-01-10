@extends('shop.main')
@section('content')

    <div class="container">
        <h1>{{ $page->title }}</h1>
        <hr>
        {!! $page->content !!}
    </div>

@endsection