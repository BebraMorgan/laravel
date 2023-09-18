@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <a type="submit" class="btn btn-primary" href="{{route('image.create')}}">Добавить</a>
    </div>
    <div class="col-8">
        <h1>Фото пользователей</h1>
        @foreach($images as $image)
            <hr>
            <h6>{{$image->title}}</h6>
            <a href="{{route('userpage', $image->user)}}"><small>Пользователь: {{$image->user->name}}</small><br></a>
            <img src="{{asset( $image->user->phone . '-m2.wsr.ru/photos/' . $image->image)}}" width="400" height="400">
            @if($image->hashtags != null)
                <p>hashtags:{{$image->hashtags}}</p>
            @endif

        @endforeach
    </div>
    <div>
        {{$images->links()}}
    </div>
</div>
@endsection
