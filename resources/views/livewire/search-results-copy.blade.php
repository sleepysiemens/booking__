
    <div class="mb-5 row row-cols-lg-12 w-100 mx-auto justify-content-center">
        @if($results!=null)
            @include('blocks.search.filter')
        @endif

        <div class="col-lg-9 pe-lg-0">
            @forelse($results as $result)
                    @include('blocks.search.ticket')
            @empty
                <div class="container mt-5">
                    <div class="row">
                        <h2 class="text-center text-primary">Ничего не найдено</h2>
                        <p class="text-center">Проверьте правильность введенных данных и повторите попытку</p>
                    </div>
                    <div class="row">
                        <img class="w-75 m-auto" src="{{asset('img/8685825_3969203.svg')}}">
                    </div>
                </div>
            @endforelse
        </div>
    </div>

