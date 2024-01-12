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

    <div class="section bg-light p-3">
        <div class="container">
            <p class="opacity-70 text-black text-decoration-underline"><a class="text-black" href="{{route('main.index')}}">Главная</a> / <a class="text-black" href="{{route('help.index')}}">Помощь</a></p>
        </div>
    </div>



    <div class="section bg-light pt-3">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-3 mb-4">
                    <div class="display-6 fw-bolder d-flex align-items-center justify-content-center mb-3">
                        Помощь
                    </div>
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <a class="btn w-100 d-flex btn-white border-0 my-2" id="tickets-btn" href="#tickets">
                                <i class="fas fa-plane-departure my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Авиабилеты</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="common-btn" href="#common">
                                <i class="fas fa-question my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Популярное</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-12">
                    <div class="display-6 fw-bolder d-flex align-items-center justify-content-center mb-3">
                        <br>
                    </div>
                    <div id="tickets">
                        <h4 class="col m-0 fw-500 my-2 mb-3 text-primary fs-22px">Авиабилеты</h4>
                        @php
                            $i=1;

                            $questions=
                                [
                                    ['question'=>'Сколько стоят ваши услуги?', 'answer'=>'Стоимость бронирования вы можете посмотреть на нашем сайте в разделе <a href="'.route("tariff.index").'">Тариф</a>'],
                                    ['question'=>'Сколько времени держится бронь авиабилета для визы?', 'answer'=>'Бронирование авиабилетов держится до 7 дней**<br><br>*после бронирования авиакомпания может уменьшить тайм-лимит по авиабилетам в одностороннем порядке.<br>*если до вылета более 20 дней.'],
                                    ['question'=>'Через сколько я получу бронь после оформления заказа?', 'answer'=>'Максимальное время выписки брони билета 30 минут (обычно выписываем в течение 15 минут).'],
                                    ['question'=>'Когда лучше делать бронирование для визы, если подача на визу через неделю?', 'answer'=>'Чтобы бронь держалась в момент рассмотрения визы, вам лучше оформить её за 1 день до подачи.'],
                                    ['question'=>'Можно ли продлить действие брони билета?', 'answer'=>'К сожалению, нет. Такой опции нет ни у одной авиакомпании.<br><br>Бронь авиабилетов не является решающей для получения визы. Для положительного решения учитываются более важные факторы: наличие шенгенских виз, трудоустройство, подтверждение платежеспособности и другие.'],
                                    ['question'=>'Я заказала у вас авиабилет, чтобы показать его в аэропорту. Если я покажу этот билет, он отображается в системе бронирования?', 'answer'=>'Да, конечно. Бронирование смогут проверить по коду бронирования указанному в маршрутной квитанции.'],
                                    ['question'=>'Подходит ли ваша бронь для прохождения пограничного контроля в аэропорту?', 'answer'=>'Да, бронь авиабилета подходит также для прохождения пограничного контроля в стране вылета/прилета. Маршрутная квитанция авиабилета предоставляется на английском и русском языке, что соответствует правилам, а также содержит номер бронирования по которому можно проверить билет.'],
                                    ['question'=>'Когда лучше оформить бронь, если мне для прохождения границы?', 'answer'=>'Советуем оформлять бронь билетов за 1 день до дня предъявления или в день предъявления.'],
                                    ['question'=>'Можно ли выкупить свою бронь билета для осуществления полета?', 'answer'=>'Нет, бронь билета нельзя выкупить. Для осуществления полета вы можете купить билет на сайтах по продаже билетов.'],
                                    ['question'=>'Можно ли оформить бронь более чем на 7 дней?', 'answer'=>'Ни одна авиакомпания не держит бронирование более 7 дней. Если вы увидели где-то другую информацию, то она недостоверна. Остерегайтесь мошенников.'],
                                    ['question'=>'Сколько держится бронь, если вылет менее чем через 20 дней?', 'answer'=>'Бронь держится от несколько часов до 1 дней. Зависит от авиакомпании и рейса.'],
                                    ['question'=>'Как проверить статус бронирования?', 'answer'=>'По коду бронирования, указанному в маршрутной квитанции, вы можете проверить бронирование 2 способами:<br>• На официальном сайте авиакомпании<br>• На сайте глобальной системы бронирования (CheckMytrip, Tripcase)<br>В первую очередь бронь необходимо проверять на сайте авиакомпании. Если бронь не найдена, то можно воспользоваться сайтами глобальных систем.'],
                                    ['question'=>'Как забронировать билет без оплаты?', 'answer'=>'Для оформления авиабилета вам необходимо:<br><br>1. Выбрать нужные рейсы и авиакомпанию в нашей форме поиска авиабилетов.<br><br>2. Заполнить форму с данными для бронирования.<br><br>3. Нажать "Оплатить" и оплатить удобным для вас способом.<br><br>4. После оплаты ваше бронирование в течение 30 минут поступит на вашу почту.'],
                                    ['question'=>'В случае бронирования авиабилета для визы, может ли возникнуть подозрение в посольстве, что что-то было сделано поддельно?', 'answer'=>'Мы оформляем только официальное бронирование с подтверждением авиакомпании, которые вы можете проверить по номеру бронирования.<br><br>Маршрутная квитанция авиабилета предоставляется на английском и русском языке, что соответствует визовому законодательству.'],
                                    ['question'=>'Не получается заполнить данные пассажиров. Что делать?', 'answer'=>'При вводе данных все буквы должны быть написаны латиницей (в английской раскладке клавиатуры), без пробелов и дефисов.<br><br>Двойная фамилия указывается слитно, без пробелов и дефисов.<br><br>Серия и номер документа указывается без пробелов и символов.<br><br>Если всё равно не получается заполнить данные, то обратитесь к нам и мы поможем.'],
                                    ['question'=>'Будет ли номер билета в брони?', 'answer'=>'Мы оформляем брони билетов с номером бронирования (PNR). Бронь будет в статусе "Подтверждено", но бронь не будет в статусе "Оплачено" и, соответственно, не будет номера билета, который есть только в оплаченных билетах.'],
                                ];
                        @endphp
                        @foreach($questions as $question)
                            <div class="card shadow mb-3 border-0 cursor-pointer" id="question-{{$i}}">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="col m-0 fw-500 fs-20px">{!! $question['question'] !!}</h4>
                                        <span class="col-1 text-black opacity-50 d-flex filter-btn" id="question-{{$i}}-marker">
                            <i class="fas fa-chevron-down m-auto"></i>
                        </span>
                                    </div>
                                    <div class="row fs-16px" style="display: none" id="answer-{{$i}}">
                                        <div class="col pt-3">
                                            <p>{!! $question['answer'] !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>

                    <div id="common" class="mt-4">
                        <h4 class="col m-0 fw-500 my-2 mb-3 text-primary fs-22px">Популярное</h4>
                        @php
                            $questions=
                                [
                                    ['question'=>'Можно оплатить картой не РФ?', 'answer'=>'Да, вы можете оплачивать картой любой страны. Стоимость брони фиксированная - 14 евро за человека.'],
                                    ['question'=>'Надо ли отменять бронирование авиабилета?', 'answer'=>'Бронирование авиабилетов отменяется автоматически по истечению времени. С вашей стороны никакого действия не требуется.'],
                                    ['question'=>'Мне нужно поменять дату вылета. Что делать?', 'answer'=>'Для этого вам необходимо оформить новый заказ на нашем сайте на нужные даты.'],
                                    ['question'=>'Допущена ошибка в данных при бронировании. Как исправить?', 'answer'=>'Чтобы исправить ошибку в паспортных данных, необходимо оплатить за корректировку. Напишите нам в чат службы поддержки или на почту.'],
                                    ['question'=>'Мне нужно изменить авиакомпанию в оформленной брони билета. Как это сделать?', 'answer'=>'Чтобы изменить авиакомпанию в уже оформленной брони билета, нужно оформить новое бронирование на нашем сайте.'],
                                    ['question'=>'Мне не пришёл билет. Что делать?', 'answer'=>'Письмо с маршрутной квитанцией отправляем на почту, которую вы указали при бронировании.<br><br>Если на почте письма нет, проверьте папку «Спам» в своём почтовом ящике — часто потерянные письма оказываются именно там.<br><br>Если в «Спаме» пусто и уже прошло 30 минут с момента оформления заказа на бронь, возможно, вы ошиблись в почте. Свяжитесь с нами любым удобным способом.'],

                                ];
                        @endphp
                        @foreach($questions as $question)
                            <div class="card shadow mb-3 border-0 cursor-pointer" id="question-{{$i}}">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="col m-0 fw-500 fs-20px">{!! $question['question'] !!}</h4>
                                        <span class="col-1 text-black opacity-50 d-flex filter-btn" id="question-{{$i}}-marker">
                            <i class="fas fa-chevron-down m-auto"></i>
                        </span>
                                    </div>
                                    <div class="row fs-16px" style="display: none" id="answer-{{$i}}">
                                        <div class="col pt-3">
                                            <p>{!! $question['answer'] !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let marker=[];
        for(let cnt=1;cnt<={{$i}};cnt++)
        {
            marker[cnt]=0;
            $('#question-'+cnt).on('click', function (){
                $('#answer-'+cnt).slideToggle( "fast", function() {});
                if(marker[cnt]==0)
                {
                    $('#question-'+cnt+'-marker').addClass('rotate-btn');
                    marker[cnt]++;
                }
                else
                {
                    $('#question-'+cnt+'-marker').removeClass('rotate-btn');
                    marker[cnt]--;
                }
            })
        }
    </script>
@endsection
