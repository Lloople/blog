@extends('backend.layouts.app')

@section('content')
    <h1 class="uppercase mb-8">Posts</h1>
    <a href="{{ route('backend.posts.create') }}" class="button bg-green float-left">Create new post</a>
    <posts-table></posts-table>
    
@endsection