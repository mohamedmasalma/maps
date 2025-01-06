<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{Route::is("ideas.main") ? "bg-primary text-white rounded" : ""}}" href="{{route("ideas.main")}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::is("feed") ? "bg-primary text-white rounded" : ""}}" href="{{route("feed")}}">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::is("terms.show") ? "bg-primary text-white rounded" : ""}}" href="{{route("terms.show")}}">
                    <span>Terms</span></a>
            </li>

        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href={{route('lang',"en")}}>EN </a>
        <a class="btn btn-link btn-sm" href={{route('lang',"ar")}}>AR </a>
        <a class="btn btn-link btn-sm" href={{route('lang',"es")}}>ES</a>
    </div>
</div>
