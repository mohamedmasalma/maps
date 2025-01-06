<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">

            <li class="nav-item">
                <a class="nav-link {{Route::is("admin.main") ? "bg-primary text-white rounded" : ""}}" href="{{route("admin.main")}}">
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{Route::is("admin.users.index") ? "bg-primary text-white rounded" : ""}}" href="{{route("admin.users.index")}}">
                    <span>Users</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{Route::is("admin.ideas.index") ? "bg-primary text-white rounded" : ""}}" href="{{route("admin.ideas.index")}}">
                    <span>Ideas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{Route::is("admin.comments.index") ? "bg-primary text-white rounded" : ""}}" href="{{route("admin.comments.index")}}">
                    <span>Comments</span></a>
            </li>

        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href={{route('lang',"en")}}>EN </a>
        <a class="btn btn-link btn-sm" href={{route('lang',"ar")}}>AR </a>
        <a class="btn btn-link btn-sm" href={{route('lang',"es")}}>ES</a>
    </div>
</div>
