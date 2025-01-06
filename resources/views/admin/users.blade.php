@extends("admin.layout")
@section("title","Users|Dashboard")
  @section("left_col")
    @include("admin.side_bar")
  @endsection
@section("content")
  <h1>Users</h1>

  <table class="table table-striped mt-3">
    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ideas count</th>
            <th>#</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->ideas_count}}</td>
            <td><a href="{{route("admin.users.show",$user)}}">View</a></td>
           </tr>
        @endforeach
    </tbody>
  </table>
@endsection
