<?php

if (!function_exists('urlGenerator')) {
    /**
     * @return \Laravel\Lumen\Routing\UrlGenerator
     */
    function urlGenerator() {
        return new \Laravel\Lumen\Routing\UrlGenerator(app());
    }
}

if (!function_exists('asset')) {
    /**
     * @param $path
     *
     * @return string
     */
    function asset($path) {
        $secured = env('SECURE_ASSET', true);

        return urlGenerator()->asset($path, $secured);
    }
}
