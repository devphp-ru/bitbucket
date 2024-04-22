<div class="am-wrapper">
<figure  data-fancybox="gallery" data-src="{{ asset('storage/' . $value->name) }}" data-caption="{{ $value->filename() }}">
    <a class="fancybox" rel="gelary-content" href="{{ asset('storage/' . $value->name) }}">
        <img loading="lazy" itemprop="contentUrl" src="{{ asset('storage/' . $value->name) }}" alt="Копирайт на фотографиях - в центре">
    </a>
</figure>
    <span>{{ $value->filename() }}</span><br>
    <span>Дата: {{ $value->date_at->format('d.m.Y') }}</span><br>
    <span>Время: {{ $value->time_at->format('H:i') }}</span><br>
    <a href="{{ route('download.zip', $value) }}">Скачать</a>
</div>
