@extends('layouts.app')
@section('content')

    <div class="container">
        <h4>Профиль пользователя {{$user->name}} {{$user->surname}}  </h4>
            <a class="btn btn-link" href="{{ route('password.update') }}">
                {{ __('Сменить пароль') }}
            </a>
    </div>

    @foreach($images as $image)
        @if($image->user->id == $user->id)
            <div class="container">
            <hr>
            <h6>{{$image->title}} </h6>
            <img src="{{asset( $image->user->phone . '-m2.wsr.ru/photos/' . $image->image)}}" width="400" height="400">
            @if($image->hashtags != null)
                <p>hashtags:{{$image->hashtags}}  </p>
            @endif
                @if($image->user->id == Auth::user()->id)
                    <br>
                    <a class="btn btn-primary" type="submit" href="{{route('image.edit', $image)}}">Изменить</a>
                    <form action="{{route('image.delete', $image)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                @endif
            </div>
        @endif
    @endforeach




@endsection
