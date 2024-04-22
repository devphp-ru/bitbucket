@extends('layouts.default')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>{{ $title }}</h1>
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item">Сортировать: </li>
            <li class="list-group-item">{!! \App\Helper\SortLink::make('названию', \App\Helper\SortLink::FIELD_NAMEA, \App\Helper\SortLink::FIELD_NAMED) !!}</li>
            <li class="list-group-item">{!! \App\Helper\SortLink::make('дате', \App\Helper\SortLink::FIELD_DATEA, \App\Helper\SortLink::FIELD_DATED) !!}</li>
            <li class="list-group-item">{!! \App\Helper\SortLink::make('времени', \App\Helper\SortLink::FIELD_TIMEA, \App\Helper\SortLink::FIELD_TIMED) !!}</li>
            <li class="list-group-item"><a href="{{ route('images.index') }}">Сброс</a></li>
        </ul>

        <div class="am-container">
            @if ($paginator->isNotEmpty())
                @foreach ($paginator as $value)
                 @include('images.components.tr_index', [$value])
                @endforeach
            @endif
        </div>

    </div>
</div>
@endsection
