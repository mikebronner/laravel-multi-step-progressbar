<?php

return [
    "sprites" => [
        "hidden" => [
            "bar" => "",
        ],
        // not previously visited step
        "unvisited" => [
            "bar" => asset("vendor/genealabs/laravel-multi-step-progressbar/unactivated-bar.png"),
            "middle-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/unactivated-middle.png"),
            "last-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/unactivated-end.png"),
        ],
        // previously visited step
        "visited" => [
            "first-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-start.png"),
            "bar" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-bar.png"),
            "middle-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-middle.png"),
            "last-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-end.png"),
        ],
        // current step, and previously visited
        "active" => [
            "first-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-current-start.png"),
            "middle-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-activated-middle.png"),
            "last-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-current-end.png"),
        ],
        // current and max visited step
        "max-active" => [
            "first-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-current-start.png"),
            "middle-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-current-middle.png"),
            "last-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/active-current-end.png"),
        ],
        // max step, not current, previously visited
        "max-visited" => [
            "middle-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-current-middle.png"),
            "last-pip" => asset("vendor/genealabs/laravel-multi-step-progressbar/activated-current-end.png"),
        ],
    ]
];
