@extends('cms/dashboard');
@section('cms_main_section')

<h1>About page</h1>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
            <div class="alert alert-secondary">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{url('cms/about')}}">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$aboutContent['title']}}">
                </div>
                <div class="form-group">
                    <label for="text">Paragraph</label>
                    <textarea class="form-control" name="text" rows="4" id="text">{!!$aboutContent['text']!!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">CHANGE ARTICLE</button>
            </form>
        </div>
    </div>
</div>


@endsection
