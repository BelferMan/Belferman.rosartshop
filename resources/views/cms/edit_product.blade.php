@extends('cms/dashboard');
@section('cms_main_section')

<h1>EDIT PRODUCT</h1>
<a href="{{url('cms/products')}}" class="btn btn-secondary">Back</a>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-secondary">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{url('cms/products/' .$item['id'])}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <input type="hidden" name="item_id" value="{{$item['id']}}">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">* Choose Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option></option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{$item['title']}}" type="text" name="title" class="form-control original-text" id="title"
                        placeholder="Enter title">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="text">* Description</label>
                    <textarea class="form-control" value="" name="description" rows="4" id="text">{{$item['description']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">* Price</label>
                    <input type="text" name="price" value="{{$item['price']}}" class="form-control original-text" id="price"
                        placeholder="Enter price">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="title">* Available</label>
                    <input type="text" name="available" value="{{$item['available']}}" class="form-control original-text"
                        id="price" placeholder="Enter quantity">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">* Product in home page?</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="home_page">
                        <option></option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-warning mt-5" value="Update product" name="submit"></input>
            </form>

        </div>
    </div>
</div>



@endsection
