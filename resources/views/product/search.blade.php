<form action="{{route('products.index')}}" method="GET">
    @csrf
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name"
                   value="{{ app('request')->input('name') }}" >
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
