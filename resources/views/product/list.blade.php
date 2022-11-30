<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">tags</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{  $product->short_description}}</td>
            <td>{{isset($product->category->name) ? $product->category->name : ""}}</td>
            <td>{{$product->tags->pluck('name')->implode(', ')}}</td>
            <td>
                <a href="{{route('products.edit', $product->id)}}"
                   class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-url="{{route('products.destroy',$product->id)}}"
                   class="btn btn-danger btn-circle btn-sm delete-item">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
{{$products->appends(request()->all())->links("pagination::bootstrap-5") }}
