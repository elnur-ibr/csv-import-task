<?php

namespace App\Services;

class Delimiters
{
    public const DELIMITOR_COMMA = ",";
    public const DELIMITOR_SEMICOLON = ';';
    public const DELIMITOR_TAB = "\t";
    public const DELIMITOR_LINE = "|";
    public const DELIMITOR_COLON = ':';
    public const DELIMITOR_SPACE = ' ';
    public const DELIMITORS = [
        self::DELIMITOR_COMMA,
        self::DELIMITOR_SEMICOLON,
        self::DELIMITOR_TAB,
        self::DELIMITOR_LINE,
        self::DELIMITOR_COLON,
        self::DELIMITOR_SPACE,
    ];

    public static function withDescription()
    {
        return [
            ['value' => static::DELIMITOR_COMMA, 'description' => 'Comma'],
            ['value' => static::DELIMITOR_SEMICOLON, 'description' => 'Semicolon'],
            ['value' => static::DELIMITOR_TAB, 'description' => 'Tab'],
            ['value' => static::DELIMITOR_LINE, 'description' => 'Line'],
            ['value' => static::DELIMITOR_COLON, 'description' => 'Colon'],
            ['value' => static::DELIMITOR_SPACE, 'description' => 'Space'],
        ];
    }
}
