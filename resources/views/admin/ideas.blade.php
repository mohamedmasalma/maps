@extends("admin.layout")
@section("title","Ideas|Dashboard")
  @section("left_col")
    @include("admin.side_bar")
  @endsection
@section("content")
  <h1>Ideas</h1>

  <table class="table table-striped mt-3">
    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>User</th>
            <th>Likes</th>
            <th>#</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($ideas as $idea )
        <tr>
            <td>{{$idea->id}}</td>
            <td>{{$idea->comment}}</td>
            <td><a href="{{route("admin.users.show",$idea->user)}}">{{$idea->user->name}}</a></td>
            <td>{{$idea->likes->count()}}</td>
            <td><a href="{{route("admin.ideas.show",$idea)}}">View</a>
                <a href="{{route("admin.ideas.edit",$idea)}}">Edit</a>
            </td>
           </tr>
        @endforeach
    </tbody>
  </table>
@endsection
