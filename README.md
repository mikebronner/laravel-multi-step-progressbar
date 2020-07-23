# Multi-Step Progressbar for Laravel

<img width="1245" alt="Screen Shot 2020-07-23 at 1 39 06 PM" src="https://user-images.githubusercontent.com/1791050/88336503-f77f9000-cce9-11ea-95ed-b8ff1fb7fb26.png">

## Installation
```sh
composer require genealabs/laravel-multi-step-progressbar
```

## Implementation
The progress-bar is implemented via a Blade component:
```php
    <x-multi-step-progressbar
        :model="$record"
        :stepData="$stepData"
    ></x-multi-step-progressbar>
```

### Model
The `$record` model represents the model that stores the information submitted in the various forms traversed. It will be passed into each view of the steps defined in `$stepData` and can be used to fill in the forms on each step. What it exactly contains is completely up to you.

### Step Data
`$stepData` is a collection of `ProgressbarItem` model instances.

#### Data Points
Each step has the following properties:
- **step**: the number of the step, presented in sequence.
- **url**: the URL of the view to load for the given step.
- **title**: will be displayed on the active step in the progress-bar. Leave blank to not show anything.
- **description**: will be displayed on the active step in the progress-bar. Leave blank to not show anything.
- **canJumpAhead**: designates if the user can jump to the step once it has been filled out.

#### Collection
You can create this as follows:
```php
$stepData = collect()
    ->push((new ProgressbarItem)->fill([
        "step" => 1,
        "url" => route("wizards.record-analysis.edit", ["record" => $record, "step" => "1"]),
        "title" => "Create Document",
        "description" => "",
        "canJumpAhead" => true,
    ]))
    ->push((new ProgressbarItem)->fill([
        "step" => 2,
        "url" => route("wizards.record-analysis.edit", ["record" => $record, "step" => "2"]),
        "title" => "Search Sources",
        "description" => "",
        "canJumpAhead" => (bool) $record->title,
    ]))
    ->push((new ProgressbarItem)->fill([
        "step" => 3,
        "url" => route("wizards.record-analysis.edit", ["record" => $record, "step" => "3"]),
        "title" => "Create Source",
        "description" => "",
        "canJumpAhead" => ($record->source || $record->wherein),
    ]))
    // ...
```

## Configuration
```php
<?php

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
```
