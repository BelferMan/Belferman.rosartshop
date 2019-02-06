@extends('cms/dashboard');
@section('cms_main_section')

<h1>Categories page</h1>
<a class="btn btn-warning mt-2" href="{{url('cms/categories/create')}}">Add category</a>
<hr>
<table class="table">
    <thead>
        <th>Category Name</th>
        <th>Oparation</th>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category['cat_name']}}</td>
            <td>
                <a href="{{url('cms/categories/'.$category['id'].'/edit')}}" class="mr-2 border-right pr-3"><i class="fas fa-pencil-alt"></i>Edit</a>
                <a href="{{url('cms/categories/'. $category['id'])}}"><i class="fas fa-trash-alt"></i>Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
