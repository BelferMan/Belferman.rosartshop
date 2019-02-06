@extends('cms/dashboard');
@section('cms_main_section')

<h1>Blog page</h1>
<a class="btn btn-warning mt-2" href="{{url('cms/blog/create')}}">Add A Blog</a>
<hr>
<table class="table">
    <thead>
        <th>Blog Name</th>
        <th>Oparation</th>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog['title']}}</td>
            <td>
                <a href="{{url('cms/blog/'.$blog['id'].'/edit')}}" class="mr-2 border-right pr-3"><i class="fas fa-pencil-alt"></i>Edit</a>
                <a href="{{url('cms/blog/'. $blog['id'])}}"><i class="fas fa-trash-alt"></i>Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
