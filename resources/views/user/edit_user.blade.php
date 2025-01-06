@extends('shared.base')

@section("content")

<div class="card">
    <form enctype="multipart/form-data" action={{route("users.update",$user->id)}} method="post">
        @csrf
        @method('PUT')
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src={{$user->getImageUrl()}} alt="Mario Avatar">
                <div>

                    <input value={{$user->name}} name="name" type="text" class="form-control">
                    @error("name")
                        <p class="text-danger">{{$message}}</p>
                    @enderror


                    <span class="fs-6 text-muted">"{{$user->email}}"</span>
                </div>
            </div>
          @can("update",$user)
               <a href={{route("users.show",$user->id)}}>view</a>
          @endcan
        </div>
        <div class="mt-3">
            <label for="image">profile picture</label>
            <input name="image" type="file" class="form-control">
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> bio : </h5>

            <div class="mb-3">
                <form action="" method="POST">
                    @csrf
                        <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}} </textarea>
                    @error("bio")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                         <div class="">
                        <button type="submit" class="btn btn-dark mb-3"> save </button>
                    </div>
                </form>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->ideas()->count()}}</a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{$user->comments()->count()}} </a>
            </div>

        </div>
    </div>
</form>
</div>
<hr>

@endsection






