<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src={{ $user->getImageURL()}} alt={{$idea->user->name}}>
                <div>
                    <h5 class="card-title mb-0"><a href={{ route('users.show', $idea->user->id) }}> {{$idea->user->name}} </a></h5>
                </div>
            </div>
            <div>
                <form action={{ route('idea.destroy', $idea->id) }} method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                    <a class="mx-2" href={{ route('idea.show', $idea->id) }}>View</a>
                    <a class="mx-2" href={{ route('idea.edit', $idea->id) }}>Edit</a>
                </form>
                
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)    
        <form action={{ route('idea.update', $idea->id) }} method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="idea" rows="3">{{$idea->content}}</textarea>
                @error('content')
                    <span class="fs-6 text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$idea->content}}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                   {{$idea->created_at}}</span>
            </div>
        </div>
       @include('shared.comment-box')
    </div>
</div>