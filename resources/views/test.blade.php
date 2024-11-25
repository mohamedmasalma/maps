@extends('shared.layout')

@section("content")

<form action={{route("test.store")}} method="post">
    @csrf
<textarea name="contet" class="form-control" id="content" rows="3"></textarea>

    <button type="submit" class="btn btn-dark mt-3"> Share </button>
</form>
@endsection
