@extends('shared.layout')

@section('left_col')
    @include('shared.side_bar')
@endsection

@section('content')
    @yield('content')
@endsection
@section('right_col')
    @include('shared.search_bar')

    @include('shared.follow')
@endsection
