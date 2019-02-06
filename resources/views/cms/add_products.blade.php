@extends('cms/dashboard');
@section('cms_main_section')

<h1>ADD PRODUCT</h1>
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
            <form method="POST" action="{{url('cms/products')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">* Choose Category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control original-text" id="title" placeholder="Enter title">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="text">* Description</label>
                    <textarea class="form-control" name="description" rows="4" id="text">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">* Price</label>
                    <input type="text" name="price" class="form-control original-text" id="price" placeholder="Enter title">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">* Product in home page?</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="home_page">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-warning mt-5" value="Add new product" name="submit"></input>
            </form>

        </div>
    </div>
</div>



@endsection
