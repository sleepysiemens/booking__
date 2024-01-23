
<form method="post" action="{{route('search.index')}}" >
    <div class="row text-black mt-4 mb-5 border-4 border rounded-2 border-primary bg-primary shadow position-absolute w-100 z-2" id="search-form">
        @csrf
        <div class="row col-12 col-lg-10 col-12 bg-white rounded rounded-1 p-0 ms-0 me-1">

            <origin-search-component></origin-search-component>

            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <div class="w-50px p-0 h-60px m-0 d-flex col-sm-1 d-none d-lg-flex">
                <i class="fas fa-exchange-alt m-auto opacity-50"></i>
            </div>

            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <destination-search-component></destination-search-component>

            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <calendar-component-first></calendar-component-first>

            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <calendar-component-second></calendar-component-second>


            <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

            <passengers-component></passengers-component>

        </div>
        <div class="col w-25 d-flex btn-primary p-0 bg-blue-600 rounded-2 h-50px h-lg-60px">
            <button class="p-0 btn m-auto h-100 w-100 text-white">Найти</button>
        </div>
    </div>
</form>

<script>
    // Интегрируем массив напрямую в JavaScript
    window.airportsData = @json($airports);
</script>
