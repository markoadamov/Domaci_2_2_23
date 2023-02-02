@extends('layout.default')

@section('content')

<?php $color = '#c4c4c4';  ?>

@foreach ($users as $user)

@if ($color === '#c4c4c4')
    <?php $color = '#f0f0f0'; ?>
@else
    <?php $color = '#c4c4c4';  ?>
@endif

<div class="row mb-3 text-center" style="background-color: {{$color}}">
    <div class="col-md-3 themed-grid-col">{{$user->name}}</div>
    <div class="col-md-6 themed-grid-col">{{$user->email}}</div>
    <div class="col-md-3 themed-grid-col">{{$user->created_at->diffForHumans() }}</div>
  </div>
@endforeach

@endsection