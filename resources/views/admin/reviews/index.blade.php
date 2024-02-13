@extends('Layouts.admin')

@section('reviews')
    active
@endsection

@section('content')
    <div class="panel panel-inverse" data-sortable-id="table-basic-2" style="">
        <!-- BEGIN panel-heading -->
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">Отзывы</h4>

        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <!-- BEGIN table-responsive -->
            <div class="table-responsive">
                <div class="overflow-hidden rounded-3">
                    <div class="row py-3 fw-700 bg-black-100">
                        <div class="col-1 text-center">#</div>
                        <div class="col-2 text-center">Имя</div>
                        <div class="col-2 text-center">Фамилия</div>
                        <div class="col-1 text-center">Оценка</div>
                        <div class="col-3 text-center">Текст</div>
                        <div class="col-1 text-center">Опубликован</div>
                        <div class="col-1 text-center"></div>
                        <div class="col-1 text-center"></div>
                    </div>
                    @php
                    $i=0;
                    @endphp
                    @foreach($reviews as $review)
                        @php$i++ @endphp
                        <div class="row py-3 @if($i%2==0) bg-light @endif ">
                            <div class="col-1 text-center">{{$review->id}}</div>
                            <div class="col-2 text-center">{{$review->name}}</div>
                            <div class="col-2 text-center">{{$review->surname}}</div>
                            <div class="col-1 text-center">{{$review->rating}}</div>
                            <div class="col-3">{{$review->text}}</div>
                            <div class="col-1 d-flex">
                                @if($review->is_published)
                                    <i class="fas fa-check m-auto fs-20px"></i>
                                @else
                                    <i class="fas fa-times m-auto fs-20px"></i>
                                @endif
                            </div>
                            <div class="col-1"><a href="{{route('admin.reviews.edit',$review->id)}}"><i class="far fa-edit fs-20px"></i></a></div>
                            <form class="col-1" method="post" action="{{route('admin.reviews.delete',$review->id)}}">
                                @csrf
                                @method('delete')
                                <button><i class="far fa-trash-alt fs-20px"></i></button>
                            </form>

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END table-responsive -->
        </div>
        <!-- END panel-body -->
    </div>
@endsection
