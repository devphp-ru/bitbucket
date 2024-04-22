@extends('layouts.default')

@section('title', $title)

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>{{ $title }}</h1>
        <div class="body-form mt-3">
            <form id="crm_form-car-donor" action="{{ route('images.uploads.file') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="file-loading">
                        <label for="slider" class="form-label">Изображения слайдера</label>
                        <input data-slider-id="1" data-component="fileinput" name="images[]" type="file" multiple>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-sm" title="Сохранить">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
