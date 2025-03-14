<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("login") ? "active" : ""}}" aria-current="page" href={{route("login")}}>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("register") ? "active" : ""}}" href={{route("register")}}>Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("ideas.main") ? "active" : ""}}" href={{route('ideas.main')}}>profile</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{Route::is("users.show") ? "active" : ""}} " href={{route("users.show",Auth::id())}}>{{Auth::user()->name}}</a>
                    </li>
                    @can("admin")
                     <li class="nav-item">
                        <a class="nav-link
                       {{ in_array(Route::currentRouteName(),
                       ['admin.main', 'admin.users.index', 'admin.ideas.index','admin.comments.index'])
                        ? "active" : ""}} "
                        href={{route("admin.main",Auth::id())}}>Admin Panel</a>
                    </li>
                    @endcan

                    <li class="nav-item">
                        <form action={{route("logout")}} method="get">
                            @csrf
                        <button class="nav-link" type="submit">logout</button>
                        </form>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
