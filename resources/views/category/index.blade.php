@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
        <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Category</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Search Category</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('category.search')
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List Categories</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('category.list')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.delete-item', function () {
            var url = $(this).attr('data-url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCategory(url);
                }
            })
        });

        function deleteCategory(url) {
            $.ajax({
                url: url,
                method: "DELETE",
                data: { "_token" : "{{ csrf_token() }}"},
                success: function (data) {
                    Swal.fire('Deleted!', 'Category Delete Successfully.', 'success')
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            })
        }
    </script>
@endsection
