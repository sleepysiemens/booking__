@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')
    <div class="section bg-light">
        <div class="container">
            <ul class="list-group-numbered">
                {{--1--}}
                <li class="list-group-item d-flex fs-18px fw-500">
                    <div>
                        <p>Общие положения</p>

                        <ul class="list-group-numbered">
                            {{--1.1--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Настоящая Политика в отношении обработки персональных данных (далее – Политика) составлена в соответствии с пунктом 2 статьи 18.1 Федерального закона «О персональных данных» № 152-ФЗ от 27 июля 2006 г., а также иными нормативными правовыми актами Российской Федерации в области защиты и обработки персональных данных и действует в отношении всех персональных данных (далее – данные), которые Организация (далее – Оператор, Общество) может получить от субъекта персональных данных, являющегося стороной по гражданско-правовому договору, от пользователя сети Интернет (далее – Пользователь) во время использования им любого из сайтов, сервисов, служб, программ, продуктов или услуг ООО «___», а также от субъекта персональных данных, состоящего с Оператором в отношениях, регулируемых трудовым законодательством (далее – Работник).
                                </p>
                            </li>
                            {{--1.2--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Оператор обеспечивает защиту обрабатываемых персональных данных от несанкционированного доступа и разглашения, неправомерного использования или утраты в соответствии с требованиями Федерального закона от 27 июля 2006 г. № 152-ФЗ «О персональных данных».
                                </p>
                            </li>
                            {{--1.3--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Оператор вправе вносить изменения в настоящую Политику. При внесении изменений в заголовке Политики указывается дата последнего обновления редакции. Новая редакция Политики вступает в силу с момента ее размещения на сайте, если иное не предусмотрено новой редакцией Политики.
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--2--}}
                <li class="list-group-item d-flex fs-18px fw-500">
                    <div>
                        <p>Термины и принятые сокращения</p>

                        <ul class="list-group-numbered">
                            {{--2.1--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Персональные данные – любая информация, относящаяся к прямо или косвенно определенному или определяемому физическому лицу (субъекту персональных данных).
                                </p>
                            </li>
                            {{--2.2--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Обработка персональных данных – любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.
                                </p>
                            </li>
                            {{--2.3--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Автоматизированная обработка персональных данных – обработка персональных данных с помощью средств вычислительной техники.
                                </p>
                            </li>
                            {{--2.4--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Информационная система персональных данных (ИСПД) – совокупность содержащихся в базах данных персональных данных и обеспечивающих их обработку информационных технологий и технических средств.
                                </p>
                            </li>
                            {{--2.5--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Персональные данные, сделанные общедоступными субъектом персональных данных, – персональные данные, доступ неограниченного круга лиц к которым предоставлен субъектом персональных данных либо по его просьбе.
                                </p>
                            </li>
                            {{--2.6--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Блокирование персональных данных – временное прекращение обработки персональных данных (за исключением случаев, если обработка необходима для уточнения персональных данных).
                                </p>
                            </li>
                            {{--2.7--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Уничтожение персональных данных – действия, в результате которых становится невозможным восстановить содержание персональных данных в информационной системе персональных данных и (или) в результате которых уничтожаются материальные носители персональных данных.
                                </p>
                            </li>
                            {{--2.8--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <p>
                                    Оператор – организация, самостоятельно или совместно с другими лицами организующая обработку персональных данных, а также определяющая цели обработки персональных данных, подлежащих обработке, действия (операции), совершаемые с персональными данными.
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--3--}}
                <li class="list-group-item d-flex fs-18px fw-500">
                    <div>
                        <p>Обработка персональных данных</p>

                        <ul class="list-group-numbered">
                            {{--3.1--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Получение персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Все персональные данные следует получать от самого субъекта. Если персональные данные субъекта можно получить только у третьей стороны, то субъект должен быть уведомлен об этом или от него должно быть получено согласие.
                                        </li>
                                        <li>
                                            Оператор должен сообщить субъекту о целях, предполагаемых источниках и способах получения персональных данных, характере подлежащих получению персональных данных, перечне действий с персональными данными, сроке, в течение которого действует согласие, и порядке его отзыва, а также о последствиях отказа субъекта дать письменное согласие на их получение.
                                        </li>
                                        <li>
                                            Документы, содержащие персональные данные, создаются путем:
                                            <ul>
                                                <li>
                                                    копирования оригиналов документов (паспорт, документ об образовании, свидетельство ИНН, пенсионное свидетельство и др.);
                                                </li>
                                                <li>
                                                    внесения сведений в учетные формы;
                                                </li>
                                                <li>
                                                    получения оригиналов необходимых документов (трудовая книжка, медицинское заключение, характеристика и др.).
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{--3.2--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Обработка персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Обработка персональных данных осуществляется:
                                            <ul>
                                                <li>
                                                    с согласия субъекта персональных данных на обработку его персональных данных;
                                                </li>
                                                <li>
                                                    в случаях, когда обработка персональных данных необходима для осуществления и выполнения возложенных законодательством РФ функций, полномочий и обязанностей;
                                                </li>
                                                <li>
                                                    в случаях, когда осуществляется обработка персональных данных, доступ неограниченного круга лиц к которым предоставлен субъектом персональных данных либо по его просьбе (далее – персональные данные, сделанные общедоступными субъектом персональных данных).
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Цели обработки персональных данных:
                                            <ul>
                                                <li>
                                                    осуществление трудовых отношений;
                                                </li>
                                                <li>
                                                    осуществление гражданско-правовых отношений;
                                                </li>
                                                <li>
                                                    для связи с пользователем, в связи с заполнением формы обратной связи на сайте, в том числе направление уведомлений, запросов и информации, касающихся использования сайта магазина, обработки, согласования заказов и их доставки, исполнения соглашений и договоров;
                                                </li>
                                                <li>
                                                    обезличивания персональных данных для получения обезличенных статистических данных, которые передаются третьему лицу для проведения исследований, выполнения работ или оказания услуг по поручению магазина.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Категории субъектов персональных данных. Обрабатываются персональные данные следующих субъектов персональных данных:
                                            <ul>
                                                <li>
                                                    физические лица, состоящие с Обществом в трудовых отношениях;
                                                </li>
                                                <li>
                                                    физические лица, уволившиеся из Общества;
                                                </li>
                                                <li>
                                                    физические лица, являющиеся кандидатами на работу;
                                                </li>
                                                <li>
                                                    физические лица, состоящие с Обществом в гражданско-правовых отношениях;
                                                </li>
                                                <li>
                                                    физические лица, являющиеся Пользователями Сайта Магазина.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Персональные данные, обрабатываемые Оператором:
                                            <ul>
                                                <li>
                                                    данные, полученные при осуществлении трудовых отношений;
                                                </li>
                                                <li>
                                                    данные, полученные для осуществления отбора кандидатов на работу;
                                                </li>
                                                <li>
                                                    данные, полученные при осуществлении гражданско-правовых отношений;
                                                </li>
                                                <li>
                                                    данные, полученные от Пользователей Сайта Магазина.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Обработка персональных данных ведется:
                                            <ul>
                                                <li>
                                                    с использованием средств автоматизации;
                                                </li>
                                                <li>
                                                    без использования средств автоматизации.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{--3.3--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Хранение персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Персональные данные субъектов могут быть получены, проходить дальнейшую обработку и передаваться на хранение как на бумажных носителях, так и в электронном виде.
                                        </li>
                                        <li>
                                            Персональные данные, зафиксированные на бумажных носителях, хранятся в запираемых шкафах либо в запираемых помещениях с ограниченным правом доступа.
                                        </li>
                                        <li>
                                            Персональные данные субъектов, обрабатываемые с использованием средств автоматизации в разных целях, хранятся в разных папках.
                                        </li>
                                        <li>
                                            Не допускается хранение и размещение документов, содержащих персональных данных, в открытых электронных каталогах (файлообменниках) в ИСПД.
                                        </li>
                                        <li>
                                            Хранение персональных данных в форме, позволяющей определить субъекта персональных данных, осуществляется не дольше, чем этого требуют цели их обработки, и они подлежат уничтожению по достижении целей обработки или в случае утраты необходимости в их достижении.
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{--3.4--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Уничтожение персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Уничтожение документов (носителей), содержащих персональных данных, производится путем сожжения, дробления (измельчения), химического разложения, превращения в бесформенную массу или порошок. Для уничтожения бумажных документов допускается применение шредера.
                                        </li>
                                        <li>
                                            Персональные данные на электронных носителях уничтожаются путем стирания или форматирования носителя.
                                        </li>
                                        <li>
                                            Факт уничтожения персональных данных подтверждается документально актом об уничтожении носителей.
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{--3.5--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Передача персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Оператор передает персональные данные третьим лицам в следующих случаях:
                                            <ul>
                                                <li>
                                                    субъект выразил свое согласие на такие действия;
                                                </li>
                                                <li>
                                                    передача предусмотрена российским или иным применимым законодательством в рамках установленной законодательством процедуры.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Перечень лиц, которым передаются персональные данные.
                                            <ul>
                                                <li>
                                                    Пенсионный фонд РФ для учета (на законных основаниях);
                                                </li>
                                                <li>
                                                    налоговые органы РФ (на законных основаниях);
                                                </li>
                                                <li>
                                                    Фонд социального страхования РФ (на законных основаниях);
                                                </li>
                                                <li>
                                                    территориальный фонд обязательного медицинского страхования (на законных основаниях);
                                                </li>
                                                <li>
                                                    страховые медицинские организации по обязательному и добровольному медицинскому страхованию (на законных основаниях);
                                                </li>
                                                <li>
                                                    банки для начисления заработной платы (на основании договора);
                                                </li>
                                                <li>
                                                    обезличенные персональные данные Пользователей сайта интернет-магазина передаются контрагентам Магазина.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </li>

                {{--4--}}
                <li class="list-group-item d-flex fs-18px fw-500">
                    <div>
                        <p>Защита персональных данных</p>
                        <ul class="list-group-numbered">
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    В соответствии с требованиями нормативных документов Оператором создана система защиты персональных данных (СЗПД), состоящая из подсистем правовой, организационной и технической защиты.
                                </div>
                            </li>
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    Подсистема правовой защиты представляет собой комплекс правовых, организационно-распорядительных и нормативных документов, обеспечивающих создание, функционирование и совершенствование СЗПД.
                                </div>
                            </li>
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    Подсистема организационной защиты включает в себя организацию структуры управления СЗПД, разрешительной системы, защиты информации при работе с сотрудниками, партнерами и сторонними лицами.
                                </div>
                            </li>
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    Подсистема технической защиты включает в себя комплекс технических, программных, программно-аппаратных средств, обеспечивающих защиту персональных данных.
                                </div>
                            </li>
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    Основными мерами защиты персональных данных, используемыми Оператором, являются:
                                    <ul>
                                        <li>
                                            Назначение лица, ответственного за обработку персональных данных, которое осуществляет организацию обработки персональных данных, обучение и инструктаж, внутренний контроль за соблюдением учреждением и его работниками требований к защите персональных данных.
                                        </li>
                                        <li>
                                            Определение актуальных угроз безопасности персональных данных при их обработке в ИСПД и разработка мер и мероприятий по защите персональных данных.
                                        </li>
                                        <li>
                                            Разработка политики в отношении обработки персональных данных
                                        </li>
                                        <li>
                                            Установление правил доступа к персональных данных, обрабатываемым в ИСПД, а также обеспечение регистрации и учета всех действий, совершаемых с персональными данными в ИСПД.
                                        </li>
                                        <li>
                                            Установление индивидуальных паролей доступа сотрудников в информационную систему в соответствии с их производственными обязанностями.
                                        </li>
                                        <li>
                                            Применение прошедших в установленном порядке процедуру оценки соответствия средств защиты информации.
                                        </li>
                                        <li>
                                            Сертифицированное антивирусное программное обеспечение с регулярно обновляемыми базами.
                                        </li>
                                        <li>
                                            Соблюдение условий, обеспечивающих сохранность персональных данных и исключающих несанкционированный к ним доступ.
                                        </li>
                                        <li>
                                            Обнаружение фактов несанкционированного доступа к персональным данным и принятие мер.
                                        </li>
                                        <li>
                                            Восстановление персональных данных, модифицированных или уничтоженных вследствие несанкционированного доступа к ним.
                                        </li>
                                        <li>
                                            Обучение работников Оператора, непосредственно осуществляющих обработку персональных данных, положениям законодательства РФ о персональных данных, в том числе требованиям к защите персональных данных, документам, определяющим политику Оператора в отношении обработки персональных данных, локальным актам по вопросам обработки персональных данных.
                                        </li>
                                        <li>
                                            Осуществление внутреннего контроля и аудита.
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                {{--5--}}
                <li class="list-group-item d-flex fs-18px fw-500">
                    <div>
                        <p>Основные права субъекта персональных данных и обязанности Оператора</p>

                        <ul class="list-group-numbered">
                            {{--5.1--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Основные права субъекта персональных данных.
                                    </p>
                                    <ul>
                                        <li>
                                            Субъект имеет право на доступ к его персональным данным и следующим сведениям:
                                            <ul>
                                                <li>
                                                    подтверждение факта обработки персональных данных Оператором;
                                                </li>
                                                <li>
                                                    правовые основания и цели обработки персональных данных;
                                                </li>
                                                <li>
                                                    цели и применяемые Оператором способы обработки персональных данных;
                                                </li>
                                                <li>
                                                    наименование и место нахождения Оператора, сведения о лицах (за исключением работников Оператора), которые имеют доступ к персональных данных или которым могут быть раскрыты персональные данные на основании договора с Оператором или на основании федерального закона;
                                                </li>
                                                <li>
                                                    сроки обработки персональных данных, в том числе сроки их хранения;
                                                </li>
                                                <li>
                                                    порядок осуществления субъектом персональных данных прав, предусмотренных Федеральным законом;
                                                </li>
                                                <li>
                                                    наименование или фамилия, имя, отчество и адрес лица, осуществляющего обработку персональных данных по поручению Оператора, если обработка поручена или будет поручена такому лицу;
                                                </li>
                                                <li>
                                                    обращение к Оператору и направление ему запросов;
                                                </li>
                                                <li>
                                                    обжалование действий или бездействия Оператора.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{--5.2--}}
                            <li class="list-group-item d-flex fs-16px fw-400">
                                <div>
                                    <p>
                                        Обязанности Оператора.
                                    </p>
                                    <ul>
                                        <li>
                                            Оператор обязан:
                                            <ul>
                                                <li>
                                                    при сборе персональных данных предоставить информацию об обработке персональных данных;
                                                </li>
                                                <li>
                                                    в случаях если персональные данные были получены не от субъекта персональных данных, уведомить субъекта;
                                                </li>
                                                <li>
                                                    при отказе в предоставлении персональных данных субъекту разъясняются последствия такого отказа;
                                                </li>
                                                <li>
                                                    опубликовать или иным образом обеспечить неограниченный доступ к документу, определяющему его политику в отношении обработки персональных данных, к сведениям о реализуемых требованиях к защите персональных данных;
                                                </li>
                                                <li>
                                                    принимать необходимые правовые, организационные и технические меры или обеспечивать их принятие для защиты персональных данных от неправомерного или случайного доступа к ним, уничтожения, изменения, блокирования, копирования, предоставления, распространения персональных данных, а также от иных неправомерных действий в отношении персональных данных;
                                                </li>
                                                <li>
                                                    давать ответы на запросы и обращения субъектов персональных данных, их представителей и уполномоченного органа по защите прав субъектов персональных данных.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
