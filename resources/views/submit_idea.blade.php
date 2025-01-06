@auth
    <h4>{{__('idea.share_idea')}}</h4>
                <div class="row">
                    <div class="mb-3">
                <form action={{route('ideas.store')}} method="POST">
                    @csrf
                        <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>

                    @error("idea")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                         <div class="">
                        <button type="submit" class="btn btn-dark"> Share </button>
                    </div>
                </form>
                </div>
@endauth
@guest
<h4> {{__("idea.login_to_share")}} </h4>
@endguest




