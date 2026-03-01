<?php

use GeneaLabs\LaravelMultiStepProgressbar\ProgressbarItem;

it('can create a progressbar item with fill', function () {
    $item = (new ProgressbarItem)->fill([
        'step' => 1,
        'url' => '/step-1',
        'title' => 'First Step',
        'description' => 'Description here',
        'canJumpAhead' => true,
    ]);

    expect($item->step)->toBe(1)
        ->and($item->url)->toBe('/step-1')
        ->and($item->title)->toBe('First Step')
        ->and($item->description)->toBe('Description here')
        ->and($item->can_jump_ahead)->toBeTrue();
});

it('handles empty strings gracefully', function () {
    $item = (new ProgressbarItem)->fill([
        'step' => 1,
        'url' => '',
        'title' => '',
        'description' => '',
        'canJumpAhead' => false,
    ]);

    expect($item->step)->toBe(1)
        ->and($item->url)->toBe('')
        ->and($item->title)->toBe('')
        ->and($item->description)->toBe('')
        ->and($item->can_jump_ahead)->toBeFalse();
});

it('converts to array with appended attributes', function () {
    $item = (new ProgressbarItem)->fill([
        'step' => 2,
        'url' => '/step-2',
        'title' => 'Second',
        'description' => 'Desc',
        'canJumpAhead' => false,
    ]);

    $array = $item->toArray();

    expect($array)->toHaveKeys(['step', 'url', 'title', 'description', 'canJumpAhead']);
});
