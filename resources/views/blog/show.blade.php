@extends('Layouts.wrapper')

@section('content')
    <div class="section section-hero h-300px">
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
                            Бронирование авиабилетов для визы
                        </h1>
                        <!-- END hero-title-desc -->
                    </div>
                    <!-- END col-8 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END section-hero-content -->
        </div>
        <!-- END container -->
    </div>
    <div class="section bg-light">
        <div class="container">
            <div class="row">
                <p class="opacity-70 text-black text-decoration-underline">
                    <a class="text-black" href="{{route('main.index')}}">Главная</a>
                    /
                    <a class="text-black" href="{{route('blog.index')}}">Блог</a>
                    /
                    <a class="text-black" href="{{route('blog.show')}}">Что такое виза цифрового кочевника?</a>
                </p>
            </div>
            <div class="row my-2">
                <a href="{{route('blog.index')}}" class="fs-16px d-flex"><i class="fas fa-arrow-left fs-14px my-auto me-1"></i> назад</a>
            </div>

            <div class="row mt-4">
                <div class="col col-lg-9">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-auto pe-0">
                                    <span class="btn btn-light border-0 d-flex">
                                        <p class="m-auto text-black fw-300 opacity-50 fs-12px">Визовый режим</p>
                                    </span>
                                </div>
                                <div class="col-auto d-flex">
                                    <p class="text-black-200 fs-12px m-auto">27 декабря</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-start">
                                    Что такое виза цифрового кочевника?
                                </div>
                            </div>

                            <div class="row px-2">
                                <img class="p-0 rounded-2 rounded" src="{{asset('img/top-view-tourist-items-with-copy-space.jpg')}}" alt="img">
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <p class="fs-16px px-2">
                                        Виза цифрового кочевника страны – это инновационная и перспективная инициатива, которая открывает новые возможности для глобальной мобильности и работы удаленно. В современном мире все больше людей предпочитают работать в онлайн-среде, не привязываясь к определенному месту проживания. Виза цифрового кочевника позволяет этим людям свободно перемещаться по разным странам, сохраняя свою работу и доход.
                                    </p>
                                    <p class="fs-16px px-2">
                                        Цифровые кочевники – это профессионалы в области информационных технологий, фрилансеры или представители современных стартапов, которые основную часть своей работы выполняют через интернет. Они не зависят от офисного пространства и готовы работать из любой точки мира.
                                    </p>
                                    <p class="fs-16px px-2">
                                        Виза цифрового кочевника страны позволяет им легально пребывать в других государствах на определенный срок для работы или бизнес-деятельности. Это создает благоприятные условия для развития международной коллаборации и обмена знаниями.
                                    </p>
                                    <p class="fs-16px px-2">
                                        Такая виза имеет ряд преимуществ. Во-первых, она способствует привлечению талантливых профессионалов и инноваторов из разных стран, что стимулирует экономический рост и развитие. Во-вторых, она обеспечивает возможность культурного обмена и взаимопонимания между разными нациями.
                                    </p>
                                    <p class="fs-16px px-2">
                                        В целом, виза цифрового кочевника страны представляет собой новую эру глобальной мобильности и гибкости работы. Она открывает двери для новых возможностей и содействует развитию международного сообщества профессионалов в сфере информационных технологий.
                                    </p>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div class="col">
                                    <div class="p-0 bg-black h-40px m-auto opacity-20 m-auto" style="height: 1px !important"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h6>Поделиться</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto pe-0">
                                    <button class="btn btn-light d-flex text-black-200 fs-20px">
                                        <i class="fab fa-vk m-auto"></i>
                                    </button>
                                </div>
                                <div class="col-auto pe-0">
                                    <button class="btn btn-light d-flex text-black-200 fs-20px">
                                        <i class="fab fa-telegram-plane m-auto"></i>
                                    </button>
                                </div>
                                <div class="col-auto pe-0">
                                    <button class="btn btn-light d-flex text-black-200 fs-20px">
                                        <i class="fab fa-twitter m-auto"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-3 d-none d-lg-block" style="transform: translateY(-25px)">
                    <h6>Последние новости</h6>
                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <p class="fw-400">Южная Корея: визы "цифровым кочевникам" и поклонникам корейской культуры</p>
                            <p class="fs-12px fw-300 m-0 opacity-50">27 декабря</p>
                        </div>
                    </div>

                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <p class="fw-400">Южная Корея: визы "цифровым кочевникам" и поклонникам корейской культуры</p>
                            <p class="fs-12px fw-300 m-0 opacity-50">27 декабря</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="section bg-light pt-0">
        <div class="container">
            <div class="row mb-3">
                <h1>Может быть интересно</h1>
            </div>
            <div class="row">
                @for($i=1; $i<=3; $i++)
                    <div class="col-lg-4 col-12 mb-3">
                        <a href="{{asset(route('blog.show'))}}" class="card shadow border-0 overflow-hidden cursor-pointer">
                            <div class="card-header w-100 h-200px overflow-hidden p-0">
                                <img class="w-100 h-100 object-fit-cover" src="{{asset('img/top-view-tourist-items-with-copy-space.jpg')}}" alt="img">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="btn btn-light border-0 d-flex">
                                            <p class="m-auto text-black fw-300 opacity-50 fs-12px">Визовый режим</p>
                                        </span>
                                    </div>
                                    <div class="row mt-3">
                                        <h6>Что такое виза цифрового кочевника?</h6>
                                    </div>
                                    <div class="row">
                                        <p class="opacity-80">Виза цифрового кочевника страны – это инновационная и перспективная инициатива ...</p>
                                    </div>
                                    <div class="row mt-3">
                                        <p class="text-black-200 fs-12px m-0">27 декабря</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection