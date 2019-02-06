@extends('cms/dashboard');
@section('cms_main_section')

<h1>Are YOU SURE?</h1>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="{{url('cms/products/').'/'.$item_id}}">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" value="Yes,Delete"></input>
                <a class="btn btn-success" href="{{url('cms/products')}}">Back to products</a>
            </form>
        </div>
    </div>
</div>



@endsection
