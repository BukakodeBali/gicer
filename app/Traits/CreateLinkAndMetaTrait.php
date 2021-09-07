<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait CreateLinkAndMetaTrait
{
    public function createLink(string $primary, string $placeholder):string
    {
        $link = $primary ?? null;
        if ($link === null || $link === '') {
            $link = preg_replace('/[^A-Za-z0-9\-]/', '', $placeholder);
            return Str::slug($link, '-');
        }

        return  $link;
    }

    public function createMeta(string $primary, string $placeholder):string
    {
        $meta = $primary ?? null;
        if ($meta === null || $meta === '') {
            $meta = strip_tags($placeholder);
            $meta = str_replace(["\n", "\r", "\t"], ' ', $meta);
            return preg_replace('/\s+?(\S+)?$/', '', substr($meta, 0, 150));
        }

        return $meta;
    }
}
