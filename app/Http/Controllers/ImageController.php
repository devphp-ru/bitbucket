<?php

namespace App\Http\Controllers;

use App\Helper\SortLink;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\View\View;
use That0n3guy\Transliteration\Facades\Transliteration;

class ImageController extends Controller
{
    public function index(Request $request): View
    {
        $title = 'Галерея изображений';

        $perPage = 40;
        $builder = Image::query();

        if ($request->filled('sort')) {
            $sortColumn = $request->input('sort', 'id');
            $builder->orderBy(SortLink::TYPES_NAMES_MAP[$sortColumn], SortLink::TYPES_SORT_MAP[$sortColumn]);
        }

        $images = $builder->paginate($perPage)->withQueryString();

        return view('images.index', [
            'title' => $title,
            'paginator' => $images,
        ]);
    }

    public function showUploadForm(): View
    {
        $title = 'Добавить изображения';

        return view('images.uploads', [
            'title' => $title,
        ]);
    }

    public function saveImage(ImageRequest $request): RedirectResponse
    {
        if (!$request->hasFile('images')) {
            return back()->withErrors(['errors' => 'Выберите файлы для загрузки.']);
        }

        foreach ($request->file('images') as $file) {
            $name = Str::lower(Transliteration::clean_filename($file->getClientOriginalName()));
            $name = Str::of($name)->basename('.' . $file->extension());
            $newName = Image::checkName($name);
            $filename = (($newName === false) ? $name : $newName) . '.' . $file->extension();
            $result = $file->storeAs('/uploads/images', $filename, 'public');
            Image::create([
                'name' => $result,
                'date_at' => Carbon::now(),
                'time_at' => time(),
            ]);
        }

        return redirect()->route('images.index')->with('success', 'Успешно сохранено.');
    }

}
