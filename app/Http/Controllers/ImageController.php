<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Services\images\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function __construct(private ImageService $imageService) {}

    public function index(Request $request): View
    {
        $title = 'Галерея изображений';

        $perPage = 40;
        $images = $this->imageService->getAllWithPagination($request, $perPage);

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

        $this->imageService->saveImage($request);

        return redirect()->route('images.index')->with('success', 'Успешно сохранено.');
    }

}
