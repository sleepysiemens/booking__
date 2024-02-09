<div class="container">
    <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
        Блог о путешествиях
    </div>

    <div class="row">
        <div class="col-auto pe-0 mb-2">
            <label>
                <input type="radio" name="category" class="d-none" wire:model.live="category_" value="-1">
                <div class="btn d-flex @if($category_==-1) btn-primary @else btn-white @endif rounded-5 h-40px"><p class="m-auto px-2">Все</p></div>
            </label>
        </div>

    @foreach($categories as $category)
            <div class="col-auto pe-0 mb-2">
                <label>
                    <input type="radio" name="category" class="d-none" wire:model.live="category_" value="{{$category->id}}">
                    <div class="btn d-flex @if($category_==$category->name) btn-primary @else btn-white @endif rounded-5 h-40px"><p class="m-auto px-2">{{$category->name}}</p></div>
                </label>
            </div>
        @endforeach
    </div>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-12 col-lg-4 mt-4">
                <a href="{{asset(route('blog.show', $post->id))}}" class="card shadow border-0 overflow-hidden cursor-pointer">
                    <div class="card-header w-100 h-200px overflow-hidden p-0">
                        <img class="w-100 h-100 object-fit-cover" src="{{asset('img/blog/'.$post->image)}}" alt="img">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                        <span class="btn btn-light border-0 d-flex">
                                            <p class="m-auto text-black fw-300 opacity-50 fs-12px">{{$categories[($post->category)-1]->name}}</p>
                                        </span>
                            </div>
                            <div class="row mt-3 h-40px">
                                <h6>{{$post->title}}</h6>
                            </div>
                            <div class="row">
                                <p class="opacity-80 hide-text">
                                    {{$post->text}}
                                </p>
                            </div>
                            <div class="row mt-3">
                                <p class="text-black-200 fs-12px m-0">{{ date("d M",strtotime($post->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row mt-4 justify-content-center">
        {{$posts->links()}}
    </div>
</div>
