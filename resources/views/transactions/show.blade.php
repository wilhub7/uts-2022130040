@extends('layouts.template')

@section('title', $transaction->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->id }}</h1>
        <p class="blog-post-meta">{{ $transaction->amount }}</p>
        <p class="blog-post-meta">{{ $transaction->type }}</p>
        <p class="blog-post-meta">{{ $transaction->category }}</p>
        <p class="blog-post-meta">{{ $transaction->notes }}</p>
    </article>
@endsection
