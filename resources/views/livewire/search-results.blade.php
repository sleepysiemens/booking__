<div class="mb-5 row row-cols-lg-12 w-100 mx-auto">
    @include('blocks.search.filter')

    <div class="col-lg-9 pe-lg-0">
        @foreach($results as $result)
            @include('blocks.search.ticket')
        @endforeach
    </div>
</div>
