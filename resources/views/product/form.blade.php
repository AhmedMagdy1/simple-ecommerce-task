@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}} Product</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
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
                        <textarea type="text" class="form-control" name="description" placeholder="Description">{{isset($data->description) ? $data->description : old('description')}}</textarea>
                        @error('description')
                            <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="file" class="form-control" name="image_path">
                            @if(isset($data->image_path) && $data->image_path != null)
                                <img src="{{$data->image_path}}" alt="Image not found" style="margin: 20px;max-width: 300px;max-height: 300px">
                            @endif
                        @error('image_path')
                        <div class="text-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <select id="tags" name="tags[]" class="form-control" multiple>
                            @foreach($lookup['tags'] as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('tags')
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
            $('#tags').select2({
                'allowClear': true,
                'multiple': true,
                "placeholder":"Select tags",
            });
        })();
        @if( isset($data->category->id) && $data->category->id != null)
            $("#categories-list").select2("trigger", "select", {data: {id: "{{$data->category->id}}", text: "{{$data->category->name}}" } });
        @endif

        @if(isset($data->tags) && $data->tags->count())
            $("#tags").val({{json_encode($data->tags->pluck('id')->toArray())}}).trigger('change');
        @endif

    </script>
@endsection
