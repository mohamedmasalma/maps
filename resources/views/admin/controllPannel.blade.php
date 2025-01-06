@extends('admin.layout')
@section("title","Dashboard")
@section("left_col")
@include("admin.side_bar")
@endsection
@section("content")
<div class="row">

    @include("admin.card",
    ["title"=>"Users",
     "data"=>$usersCount,
      "icon"=>"fa-users"])

@include("admin.card",
["title"=>"Ideas",
 "data"=>$ideasCount,
  "icon"=>"fa-lightbulb"])

@include("admin.card",
["title"=>"Comments",
 "data"=>$commentsCount,
  "icon"=>"fa-comment"])

</div>
@endsection
