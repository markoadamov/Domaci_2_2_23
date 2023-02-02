@extends('layout.default')

@section('content')

<?php $color = '#c4c4c4';  ?>
@foreach ($posts as $post)
@if ($color === '#c4c4c4')
    <?php $color = '#f0f0f0'; ?>
@else
    <?php $color = '#c4c4c4';  ?>
@endif
<form action="{{ url('delete-post') }}" method="POST">
    @csrf
<div class="row mb-1 text-center">
    <div class="col-md-8 themed-grid-col" style="background-color: {{$color}}">{{$post->title}}</div>
    

        <div class="col-md-4 themed-grid-col" ><button type="submit" style="width: 100%; background-color: rgb(255, 183, 183)">Delete</button></div>
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">

    </div>
</form>
@endforeach

@endsection