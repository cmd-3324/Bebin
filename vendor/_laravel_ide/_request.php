<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\BebinUsers|null
     */
    public function user($guard = null);
}