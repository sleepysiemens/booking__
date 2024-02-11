@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    <div class="section section-hero mb-3" style="height: 70vh;">
        <!-- BEGIN section-bg -->
        <div class="section-bg with-cover" style="background-image: url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
        <div class="section-bg bg-gray-800 bg-opacity-50"></div>
        <!-- END section-bg -->

        <!-- BEGIN container -->
        <div class="container position-relative">
            <!-- BEGIN section-hero-content -->
            <div class="section-hero-content">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-8 -->
                    <div class="col-lg-8 col-lg-10 col-lg-12">
                        <!-- BEGIN hero-title-desc -->
                        <h1 class="hero-title mb-3 mt-5 pt-md-5">
                            Бронирование авиабилетов {{--для визы--}}
                        </h1>
                        <div class="fs-18px text-white text-opacity-80">
                            <br>
                        </div>
                        <!-- END hero-title-desc -->

                        <!-- BEGIN row -->
                        @include('blocks.search')
                        <!-- END row -->
                    </div>
                    <!-- END col-8 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END section-hero-content -->
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section">
        <!-- BEGIN container -->
        <div class="container">
            <div class="section-subtitle">Последние новости</div>

            <!-- BEGIN row -->
            <div class="row">
                @foreach($posts as $post)
                <!-- BEGIN col-3 -->
                <div class="col-lg-3 col-6 latest-news pt-2 rounded-3">
                    <!-- BEGIN news -->
                    <div class="news">
                        <div class="news-media">
                            <div class="news-media-img news-media-img-lg position-relative">
                                <img class="w-100 h-100 object-fit-cover position-absolute top-0" src="{{asset('img/blog/'.$post->image)}}" alt="img">
                            </div>
                        </div>
                        <div class="news-content">
                            <div class="news-title">{{$post->title}}</div>
                            <div class="news-date">{{date("d M Y", strtotime($post->created_at))}}</div>
                        </div>
                        <a href="{{route('blog.show',$post->id)}}" class="stretched-link"></a>
                    </div>
                    <!-- END news -->
                </div>
                <!-- END col-3 -->
                @endforeach

            </div>
            <!-- END row -->

            <div class="text-center mt-2">
                <a href="{{route('blog.index')}}" class="arrow-btn">
                    <span>
                        <i class="fa fa-arrow-right first"></i>
                        <i class="fa fa-arrow-right second"></i>
                    </span>
                    Все новости
                </a>
            </div>
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section p-0 bg-light">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <div class="pt-lg-5 pb-lg-3 text-center">
                <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                    Как это работает?
                </div>
                <p class="fs-18px mb-5">
                    Забронируйте билет за несколько шагов
                </p>
            </div>
            <!-- END section-title -->
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section pt-0 bg-light">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row gx-5 mb-5">
                <!-- BEGIN col-6 -->
                <div class="col-lg-6">
                    <!-- BEGIN news -->
                    <div class="news rounded-3 overflow-hidden shadow-lg mb-5 mb-lg-0">
                        <div class="news-media mb-0">
                            <div class="news-media-img" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                        </div>
                        <div class="news-content px-4 py-4">
                            <div class="news-label"><span class="bg-teal-200 text-teal-800">1 шаг</span></div>
                            <div class="news-title">Текст</div>
                            <div class="news-date">Текст</div>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                    <!-- END news -->
                </div>
                <!-- END col-6 -->
                <!-- BEGIN col-6 -->
                <div class="col-lg-6">
                    <div class="row h-100">
                        <div class="col-lg-12 h-50 mb-5 mb-lg-0 pb-lg-3">
                            <!-- BEGIN news -->
                            <div class="news rounded-3 overflow-hidden shadow-lg d-flex h-100 mb-0">
                                <div class="news-content w-50 p-4 d-flex align-items-center">
                                    <div>
                                        <div class="news-label"><span class="bg-warning-200 text-warning-800">2 шаг</span></div>
                                        <div class="news-title">Текст</div>
                                        <div class="news-date">Текст</div>
                                    </div>
                                </div>
                                <div class="news-media w-50 h-100 mb-0">
                                    <div class="news-media-img h-100 pt-0" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                                </div>
                                <a href="#" class="stretched-link"></a>
                            </div>
                            <!-- END news -->
                        </div>
                        <div class="col-lg-12 h-50 mb-5 mb-lg-0 pt-lg-3">
                            <!-- BEGIN news -->
                            <div class="news rounded-3 overflow-hidden shadow-lg d-flex h-100 mb-0">
                                <div class="news-media w-50 mb-0">
                                    <div class="news-media-img h-100 pt-0" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                                </div>
                                <div class="news-content w-50 p-4 d-flex align-items-center">
                                    <div>
                                        <div class="news-label"><span class="bg-primary-200 text-theme-800">3 шаг</span></div>
                                        <div class="news-title">Текст</div>
                                        <div class="news-date">Текст</div>
                                    </div>
                                </div>
                                <a href="#" class="stretched-link"></a>
                            </div>
                            <!-- END news -->
                        </div>
                    </div>
                </div>
                <!-- END col-6 -->
            </div>
            <!-- END row -->

        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section pt-0">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <div class="pt-lg-5 pb-lg-3 text-center">
                <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                    Вопросы и ответы
                </div>
            </div>
            <!-- END section-title -->
        </div>
        <!-- END container -->
        <!-- BEGIN container -->
        <div class="container">
            <question-component question="Сколько стоят ваши услуги?" answer="Стоимость бронирования вы можете посмотреть на нашем сайте в разделе Тариф"></question-component>
            <question-component question="Через сколько я получу бронь после оформления заказа?" answer="Максимальное время выписки брони билета 30 минут (обычно выписываем в течение 15 минут)."></question-component>
            <question-component question="Когда лучше делать бронирование для визы, если подача на визу через неделю?" answer="Чтобы бронь держалась в момент рассмотрения визы, вам лучше оформить её за 1 день до подачи."></question-component>
            <question-component question="Подходит ли ваша бронь для прохождения пограничного контроля в аэропорту?" answer="Да, бронь авиабилета подходит также для прохождения пограничного контроля в стране вылета/прилета. Маршрутная квитанция авиабилета предоставляется на английском и русском языке, что соответствует правилам, а также содержит номер бронирования по которому можно проверить билет."></question-component>
            <question-component question="Можно ли выкупить свою бронь билета для осуществления полета?" answer="Нет, бронь билета нельзя выкупить. Для осуществления полета вы можете купить билет на сайтах по продаже билетов."></question-component>

            <div class="text-center">
                <a href="#" class="arrow-btn">
                    <span>
                        <i class="fa fa-arrow-right first"></i>
                        <i class="fa fa-arrow-right second"></i>
                    </span>
                     Все вопросы</a>
            </div>

        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    {{----}}
    <!-- BEGIN section -->
    <div class="section bg-light">
        <!-- BEGIN container -->
        <div class="container">
            <div class="section-subtitle">Отзывы</div>

            <!-- BEGIN row -->
            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-lg-4">
                        <!-- BEGIN reviews -->
                        <div class="card border-0 shadow mb-4">
                            <div class="card-body h-250px">
                                <div class="news">
                                    <div class="news-content">
                                        <div class="row">
                                            <div class="news-title col">Отзыв</div>
                                            <p class="news-date col text-end">{{date("d.m.Y H:i",strtotime($review->created_at))}}</p>
                                        </div>
                                        <div class="news-label"><span class="bg-teal-200 text-teal-800"><i class="fas fa-star text-teal-400"></i>  {{$review->rating}}.0</span></div>
                                        <div class="section-desc hide-text">
                                            {{$review->text}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END reviews -->
                    </div>
                @endforeach

            </div>
            <!-- END row -->

            <div class="text-center">
                <a href="{{route('reviews.index')}}" class="arrow-btn">
                    <span>
                        <i class="fa fa-arrow-right first"></i>
                        <i class="fa fa-arrow-right second"></i>
                    </span>
                    Все отзывы
                </a>
            </div>
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->
    {{----}}

@endsection

@section('scripts')

    <script>
        // Интегрируем массив напрямую в JavaScript
        window.airportsData = @json($airports);
        @if(isset($request))
            window.requestData = @json($request);
        @else
            window.requestData = {req:' ',origin:'',origin_:'', destination:'', destination_:'', departDate:'', returnDate:'', passengers: {adults: 1, children: 0, infants: 0}, trip_class:0, passengers_amount: '1 пассажир'};
        @endif
        //console.log(window.requestData);
    </script>
@endsection
