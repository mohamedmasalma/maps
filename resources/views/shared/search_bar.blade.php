<div class="card">
    <form action={{ route('ideas.main') }} method=get>
        <div class="card-header pb-0 border-0">
            @csrf
            <h5 class="">{{ __('idea.search') }}</h5>
        </div>
        <div class="card-body">
            <input value="{{request("search")}}" placeholder="... " class="form-control w-100" type="text" name="search">
            <button type="submit" class="btn btn-dark mt-2"> Search</button>
        </div>
    </form>
</div>
