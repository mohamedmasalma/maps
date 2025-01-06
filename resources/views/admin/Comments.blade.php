@extends("admin.layout")
@section("title","Comments|Dashboard")
  @section("left_col")
    @include("admin.side_bar")
  @endsection
@section("content")
  <h1>Comments</h1>

  <table class="table table-striped mt-3">
    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>User</th>
            <th>Idea Id</th>
            <th>#</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($comments as $comment )
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->comment}}</td>
            <td><a href="{{route("admin.users.show",$comment->user)}}">{{$comment->user->name}}</a></td>
            <td><a href="{{route("admin.ideas.show",$comment->idea)}}">{{$comment->idea->id}}</a></td>
            <td>
                <form action="{{route("admin.comments.destroy",$comment)}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-danger"  type="submit">Delete</button>
                </form>

           </tr>
        @endforeach
    </tbody>
  </table>
@endsection
