<?php
/**
 * Created by TW Dev Team.
 * User: guoxiang
 * Date: 2018/4/25
 * Time: 18:46
 */

/**
 * @param string $guard
 *
 * @return string|null
 */
function getModelForGuard(string $guard)
{
    return collect(config('auth.guards'))
        ->map(function ($guard) {
            return config("auth.providers.{$guard['provider']}.model");
        })->get($guard);
}

function isNotLumen() : bool
{
    return ! preg_match('/lumen/i', app()->version());
}
