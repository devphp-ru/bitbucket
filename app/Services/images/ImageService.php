<?php

namespace App\Services\images;

use App\Helper\SortLink;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use That0n3guy\Transliteration\Facades\Transliteration;

final class ImageService
{
    public function getAllWithPagination(
        Request $request,
        int $perPage
    ): LengthAwarePaginator
    {
        $builder = Image::query();

        if ($request->filled('sort')) {
            $sortColumn = $request->input('sort', 'id');
            $builder->orderBy(SortLink::TYPES_NAMES_MAP[$sortColumn], SortLink::TYPES_SORT_MAP[$sortColumn]);
        }

        return $builder->paginate($perPage)->withQueryString();
    }

    public function saveImage(Request $request): void
    {
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
    }

}
