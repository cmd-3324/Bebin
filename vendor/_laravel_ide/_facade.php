<?php

namespace Illuminate\Support\Facades;

interface Auth
{
    /**
     * @return \App\Models\BebinUsers|false
     */
    public static function loginUsingId(mixed $id, bool $remember = false);

    /**
     * @return \App\Models\BebinUsers|false
     */
    public static function onceUsingId(mixed $id);

    /**
     * @return \App\Models\BebinUsers|null
     */
    public static function getUser();

    /**
     * @return \App\Models\BebinUsers
     */
    public static function authenticate();

    /**
     * @return \App\Models\BebinUsers|null
     */
    public static function user();

    /**
     * @return \App\Models\BebinUsers|null
     */
    public static function logoutOtherDevices(string $password);

    /**
     * @return \App\Models\BebinUsers
     */
    public static function getLastAttempted();
}