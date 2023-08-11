@extends('layout.layout')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container py-4">
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
       @include('shared.success-message')
       @include('shared.error-message')
        <hr>
          <div class="mt-3">
               @include('shared.idea-card')
            </div>
    </div>
    <div class="col-3">
        @include('shared.search-box')
        @include('shared.follow-box')
    </div>
</div>
</div>
@endsection