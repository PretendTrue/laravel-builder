<?php

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
            'path' => config('builder.path')
        ];
    }
}