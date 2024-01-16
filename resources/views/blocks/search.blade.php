<form method="post" action="{{route('search.index')}}">
    <div class="row text-black mt-4 mb-5 border-4 border rounded-2 border-primary bg-primary shadow position-absolute w-100 z-2" id="search-form">
        @csrf
        <div class="row col-12 col-lg-10 col-12 bg-white rounded rounded-1 p-0 ms-0 me-1">
            <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6">
                <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Откуда</legend>
                <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="origin" required value="LED">
            </fieldset>

            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <div class="w-50px p-0 h-60px m-0 d-flex col-sm-1 d-none d-lg-flex">
                <i class="fas fa-exchange-alt m-auto opacity-50"></i>

            </div>
            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <fieldset class="brdr-b-r p-0 col-1 h-60px m-0 col-lg col-6">
                <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Куда</legend>
                <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="destination" required value="MOW">

            </fieldset>
            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6">
                <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата туда</legend>
                <input class="bg-transparent border-0 ms-2 p-0 h-100" style="width: 95%;" type="date" required name="departDate">

            </fieldset>
            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <fieldset class="brdr-b-r p-0 col-1 h-60px m-0 col-lg col-6">
                <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата обратно</legend>
                <input class="bg-transparent border-0 ms-2 p-0 h-100" style="width: 95%;" type="date" required name="returnDate">

            </fieldset>
            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6">
                <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Пассажиры, класс</legend>
                <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" required name="passenger">
            </fieldset>
        </div>
        <div class="col w-25 d-flex p-0 bg-primary h-50px h-lg-60px">
            <button class="p-0 btn btn-primary m-auto h-100 w-100">Найти</button>
        </div>
    </div>
</form>
