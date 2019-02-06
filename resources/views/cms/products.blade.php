@extends('cms/dashboard');
@section('cms_main_section')

<h1>Categories page</h1>
<a class="btn btn-warning mt-2" href="{{url('cms/products/create')}}">Add Product</a>
<hr>
<table class="table">
    <thead>
        <th>Item Name</th>
        <th>Available</th>
        <th>Show on home page</th>
        <th>Oparation</th>
    </thead>
    <tbody>
        @foreach($products as $item)
        <tr>
            <td>
                <img class="mr-5 cms-img" src="{{asset('tpl/images/'.'/'.$item['pro_image'])}}" alt="">
                {{$item['title']}}
            </td>
            <td>
                {{ $item['available']}}
            </td>
            @if($item['home_show'] == 1)
            <td>Yes</td>
            @else
            <td>No</td>
            @endif
            <td>
                <a href="{{url('cms/products/'.$item['id'].'/edit')}}" class="mr-2 border-right pr-3"><i class="fas fa-pencil-alt"></i>Edit</a>
                <a href="{{url('cms/products/'. $item['id'])}}"><i class="fas fa-trash-alt"></i>Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
