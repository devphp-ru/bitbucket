<?php

namespace App\Helper;

final class SortLink
{
    public const FIELD_NAMEA = 'namea';
    public const FIELD_NAMED = 'named';
    public const FIELD_DATEA = 'datea';
    public const FIELD_DATED = 'dated';
    public const FIELD_TIMEA = 'timea';
    public const FIELD_TIMED = 'timed';

    private const FIELD_NAME = 'name';
    private const FIELD_DATE_AT = 'date_at';
    private const FIELD_TIME_AT = 'time_at';

    private const SORT_ASC = 'asc';
    private const SORT_DESC = 'desc';

    public const TYPES_SORT_MAP = [
        self::FIELD_NAMEA => self::SORT_ASC,
        self::FIELD_NAMED => self::SORT_DESC,
        self::FIELD_DATEA => self::SORT_ASC,
        self::FIELD_DATED => self::SORT_DESC,
        self::FIELD_TIMEA => self::SORT_ASC,
        self::FIELD_TIMED => self::SORT_DESC,
    ];

    public const TYPES_NAMES_MAP = [
        self::FIELD_NAMEA => self::FIELD_NAME,
        self::FIELD_NAMED => self::FIELD_NAME,
        self::FIELD_DATEA => self::FIELD_DATE_AT,
        self::FIELD_DATED => self::FIELD_DATE_AT,
        self::FIELD_TIMEA => self::FIELD_TIME_AT,
        self::FIELD_TIMED => self::FIELD_TIME_AT,
    ];

    public static function make(
        string $title,
        string $asc,
        string $desc,
    ): string
    {
        $sort = request()->get('sort');

        if ($sort == $asc) {
            return "<a href=\"" . route('images.index', ['sort' => $desc]) . "\">{$title} <i>▲</i></a>";
        } elseif ($sort == $desc) {
            return "<a href=\"" . route('images.index', ['sort' => $asc]) . "\">{$title} <i>▼</i></a>";
        } else {
            return "<a href=\"" . route('images.index', ['sort' => $asc]) . "\">{$title}</a>";
        }
    }

}
