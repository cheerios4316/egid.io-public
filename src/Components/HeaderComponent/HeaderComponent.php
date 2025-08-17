<?php

namespace Src\Components\HeaderComponent;

use DumpsterfirePages\Component;

class HeaderComponent extends Component
{
    protected static string $title = "> egid.io";

    protected static bool $animate = true;

    protected static string $url = '/';

    public function getTitle(): string
    {
        return self::$title;
    }

    public function getAnimate(): bool
    {
        return self::$animate;
    }

    public function getUrl(): string
    {
        return self::$url;
    }

    public static function setTitle(string $title): void
    {
        self::$title = $title;
    }

    public static function setAnimate(bool $animate): void
    {
        self::$animate = $animate;
    }

    public static function setUrl(string $url): void
    {
        self::$url = $url;
    }
}