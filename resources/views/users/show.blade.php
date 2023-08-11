@extends('layout.layout')

@section('title')
    Profile
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
               @include('shared.user-card')
            </div>
        <hr>
        @forelse ($ideas->withQueryString() as $idea)
        <div class="mt-3">
           @include('shared.idea-card')
        </div>
        @empty
        <div class="text-center mt-4">No Data Found</div>
        @endforelse
        <div class="mt-3">
            {{$ideas->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-box')
        @include('shared.follow-box')
    </div>
</div>
</div>
@endsection