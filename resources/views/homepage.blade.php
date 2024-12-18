@extends('layouts.app')
@section('content')

<div class="space-y-8">
  @foreach($posts as $post)
  @include('component.artikelCard', ['post' => $post])
  @endforeach
</div>

@endsection