@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-8">
            <h1>Изменить фото</h1>
            <form method="post" action="{{ route('image.update', $image) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title">Название фото</label>
                    <input type="text" value="{{$image->title}}" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="hashtags">Хештеги</label>
                    <textarea class="form-control" id="hashtags" rows="3" name="hashtags">{{$image->hashtags}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Картинка</label>
                    <input type="file" value="{{asset( $image->user->phone . '-m2.wsr.ru/photos/' . $image->image)}}" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection
