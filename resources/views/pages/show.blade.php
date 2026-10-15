@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? '')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $page->title }}</h1>
    <div class="prose prose-lg prose-indigo max-w-none">
        {!! $page->content !!}
    </div>
</div>
@endsection
