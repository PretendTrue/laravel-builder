<?php

/*
 * This file is part of the pretendtrue/laravel-builder.
 *
 * (c) pretendtrue <play@pretendtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PretendTrue\LaravelBuilder;

class Builder
{
    /**
     * Get the default JavaScript variables for Builder.
     * 获取 Builder 的 JavaScript 默认变量。
     *
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'path' => config('builder.path'),
        ];
    }
}
