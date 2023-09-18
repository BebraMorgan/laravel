@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-8">
            <h1>Добавить фото</h1>
            <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Название фото</label>
                    <input type="text" value="untitled" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="hashtags">Хештеги</label>
                    <textarea class="form-control" id="hashtags" rows="3" name="hashtags"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Картинка</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection
