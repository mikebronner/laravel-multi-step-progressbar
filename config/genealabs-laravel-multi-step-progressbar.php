<?php

use App\Http\ViewComposers\RecordWizardViewComposer;

return [
    "sprites" => [
        "hidden" => [
            "bar" => "",
        ],
        // not previously visited step
        "unvisited" => [
            "bar" => asset("images/assets/progress-bar/unactivated-bar.png"),
            "middle-pip" => asset("images/assets/progress-bar/unactivated-middle.png"),
            "last-pip" => asset("images/assets/progress-bar/unactivated-end.png"),
        ],
        // previously visited step
        "visited" => [
            "first-pip" => asset("images/assets/progress-bar/activated-start.png"),
            "bar" => asset("images/assets/progress-bar/activated-bar.png"),
            "middle-pip" => asset("images/assets/progress-bar/activated-middle.png"),
            "last-pip" => asset("images/assets/progress-bar/activated-end.png"),
        ],
        // current step, and previously visited
        "active" => [
            "first-pip" => asset("images/assets/progress-bar/active-current-start.png"),
            "middle-pip" => asset("images/assets/progress-bar/active-activated-middle.png"),
            "last-pip" => asset("images/assets/progress-bar/active-current-end.png"),
        ],
        // current and max visited step
        "max-active" => [
            "first-pip" => asset("images/assets/progress-bar/active-current-start.png"),
            "middle-pip" => asset("images/assets/progress-bar/active-current-middle.png"),
            "last-pip" => asset("images/assets/progress-bar/active-current-end.png"),
        ],
        // max step, not current, previously visited
        "max-visited" => [
            "middle-pip" => asset("images/assets/progress-bar/activated-current-middle.png"),
            "last-pip" => asset("images/assets/progress-bar/activated-current-end.png"),
        ],
    ]
];
