@extends('shared.base')
@section("title","Feed")
@section('content')
@include('success_meassage')
    @include('submit_idea')
    <hr>

    @forelse($ideas as $idea)
        <div class="mt-3">
            @include('card')
        </div>
        @empty
        <p class="text-center mt-3">no records</p>
    @endforelse
    {{ $ideas->withQueryString()->links() }}
@endsection
