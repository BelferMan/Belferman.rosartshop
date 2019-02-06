@extends('cms/dashboard');
@section('cms_main_section')

<h1>ADD CATEGORY</h1>
<a href="{{url('cms/categories')}}" class="btn btn-secondary">Back</a>
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
            <form method="POST" action="{{url('cms/categories')}}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control original-text" id="title" placeholder="Enter title">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" name="url" class="form-control target-text" id="url" placeholder="Enter url">
                    <span class="text-danger"></span>
                </div>
                <input type="submit" class="btn btn-warning" value="Add new category"></input>
            </form>

        </div>
    </div>
</div>



@endsection
