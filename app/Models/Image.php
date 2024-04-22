<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 *
 * @property int $id ID
 * @property string $name Путь файла
 * @property \Illuminate\Support\Carbon $date_at Дата загрузки
 * @property \Illuminate\Support\Carbon $time_at Время загрузки
 *
 * @mixin Builder
 * @package App\Models
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_at',
        'time_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'date_at' => 'date',
        'time_at' => 'datetime'
    ];

    public function filename(): string
    {

        return basename($this->name, '.' . pathinfo($this->name, PATHINFO_EXTENSION));
    }

    public static function checkName(string $name): bool|string
    {
        $result = self::where('name', 'like', "%{$name}%")->exists();

        if ($result) {
            $name .= '_' . mt_rand(0, 10);
            $result = self::checkName($name);

            if (!$result) {
                return $name;
            }
        }

        return $result;
    }

}
