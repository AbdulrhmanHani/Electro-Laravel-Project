@if ($errors->any())

    <div class="bg-danger rounded">
        @foreach ($errors->all() as $error)
            <h5 class="danger text-center text-dark">* {{ $error }}</h5>
        @endforeach
    </div>

@endif
