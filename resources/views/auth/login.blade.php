@extends("shared.layout")

@section("content")
<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6">
        <form class="form mt-5" action={{route("authenticate")}} method="get">
            @csrf

            <h3 class="text-center text-dark">login</h3>

            <div class="form-group mt-3">
                <label for="email" class="text-dark">Email:</label><br>
                <input type="" name="email" id="email" class="form-control">

                @error("email")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text-dark">Password:</label><br>
                <input type="text" name="password" id="password" class="form-control">

            </div>
            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
            </div>
            <div class="text-right mt-2">
                <a href="" class="text-dark">register here</a>
            </div>
        </form>
    </div>
</div>
@endsection
