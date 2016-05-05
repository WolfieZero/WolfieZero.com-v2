<?php
// =============================================================================
// Heplers
// =============================================================================

use Illuminate\Support\Str;

/**
 * Get the path to a versioned Elixir file. If it cannot find the
 * file the it will fallback to the `$file` value.
 *
 * @param   string  $file            File to cache bust
 * @param   string  $buildDirectory  Directory of busted files
 * @return  string
 */
function get_elixir($file, $buildDirectory = '')
{
    static $manifest;
    static $manifestPath;

    if (is_null($manifest) || $manifestPath !== $buildDirectory) {
        $manifest = json_decode(file_get_contents(get_template_directory() . '/' . $buildDirectory . '/rev-manifest.json'), true);
        $manifestPath = $buildDirectory;
    }

    $pattern = '/((http|https)\:\/\/)?' . $_SERVER['SERVER_NAME'] . '/';
    $uriJunk = preg_replace($pattern, '', get_template_directory_uri()) . '/';
    $fileRef = str_replace($uriJunk, '', $file);

    if (isset($manifest[$fileRef])) {
        return get_template_directory_uri() . '/' . $buildDirectory . '/' . $manifest[$fileRef];
    }

    return $file;
}

/**
 * Helper wrapper for `get_elixir()`.
 * Just echos out the contents.
 *
 * @param   string  $file            File to cache bust
 * @param   string  $buildDirectory  Directory of busted files
 * @return  string
 */
function elixir($file, $buildDirectory = '')
{
    echo get_elixir($file, $buildDirectory);
}

/**
 * Gets the value of an environment variable.
 * Supports boolean, empty and null.
 *
 * @param   string  $key
 * @param   mixed   $default
 * @return  mixed
 */
function env($key, $default = null)
{
    $value = getenv($key);

    if ($value === false) {
        return value($default);
    }

    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;
        case 'false':
        case '(false)':
            return false;
        case 'empty':
        case '(empty)':
            return '';
        case 'null':
        case '(null)':
            return;
    }

    if (strlen($value) > 1 && Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
        return substr($value, 1, -1);
    }

    return $value;
}
