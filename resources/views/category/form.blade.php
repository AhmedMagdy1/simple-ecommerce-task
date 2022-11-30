@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}} Category</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{$action}}" method="POST">
                @if( strcasecmp($method, 'PUT') == 0 )
                    @method('PUT')
                @endif
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="name" placeholder="Name" aria-label="Name"
                               value="{{isset($data->name) ? $data->name : old('name')}}">
                        @error('name')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <select id="categories-list" name="category_id" class="form-control">
                        </select>
                        @error('category_id')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function () {
            $('#categories-list').select2({
                ajax: {
                    url: '{{ route("categories.search") }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            term: params.term || "",
                            page: params.page || 1,
                            id: "{{request()->route('category')}}",
                        }
                    },

                },
                minimumInputLength: 1,
                'allowClear': true,
                "placeholder":"Select an option",
                cache: true,
            });
        })();
    @if( isset($data->parent->id) && $data->parent->id != null)
        $("#categories-list").select2("trigger", "select", {data: {id: "{{$data->parent->id}}", text: "{{$data->parent->name}}" } });
    @endif
    </script>
@endsection
