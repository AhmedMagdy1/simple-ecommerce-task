@extends('layouts.dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{route('products.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create product</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Search product</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('product.search')
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List products</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @include('product.list')
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
                    deleteProduct(url);
                }
            })
        });

        function deleteProduct(url) {
            $.ajax({
                url: url,
                method: "DELETE",
                data: { "_token" : "{{ csrf_token() }}"},
                success: function (data) {
                    Swal.fire('Deleted!', 'product Delete Successfully.', 'success')
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            })
        }
    </script>
@endsection
