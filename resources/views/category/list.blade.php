<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Parent Category</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{isset($category->parent->name) ? $category->parent->name : ""}}</td>
            <td>
                <a href="{{route('categories.edit', $category->id)}}"
                   class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-url="{{route('categories.destroy',$category->id)}}"
                   class="btn btn-danger btn-circle btn-sm delete-item">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
{{ $categories->appends(request()->all())->links("pagination::bootstrap-5") }}
