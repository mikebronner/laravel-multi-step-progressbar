<?php

use GeneaLabs\LaravelMultiStepProgressbar\ProgressbarItem;

test('it can be instantiated with no attributes', function () {
    $item = new ProgressbarItem;

    expect($item->toArray())->toBe([]);
});

test('it can be instantiated with attributes', function () {
    $item = new ProgressbarItem([
        'step' => 1,
        'title' => 'Step One',
        'description' => 'First step',
        'url' => '/step/1',
        'canJumpAhead' => true,
    ]);

    expect($item->step)->toBe(1);
    expect($item->title)->toBe('Step One');
    expect($item->description)->toBe('First step');
    expect($item->url)->toBe('/step/1');
    expect($item->canJumpAhead)->toBeTrue();
});

test('it can be filled via fill method', function () {
    $item = (new ProgressbarItem)->fill([
        'step' => 2,
        'title' => 'Step Two',
        'description' => '',
        'url' => '/step/2',
        'canJumpAhead' => false,
    ]);

    expect($item->step)->toBe(2);
    expect($item->title)->toBe('Step Two');
    expect($item->canJumpAhead)->toBeFalse();
});

test('it ignores non-fillable attributes', function () {
    $item = (new ProgressbarItem)->fill([
        'step' => 1,
        'title' => 'Test',
        'hacky' => 'should not be set',
    ]);

    expect($item->getAttribute('hacky'))->toBeNull();
    expect($item->step)->toBe(1);
});

test('it supports array access', function () {
    $item = new ProgressbarItem(['step' => 1, 'title' => 'Test']);

    expect($item['step'])->toBe(1);
    expect(isset($item['step']))->toBeTrue();
    expect(isset($item['nonexistent']))->toBeFalse();

    $item['title'] = 'Updated';
    expect($item['title'])->toBe('Updated');

    unset($item['title']);
    expect($item['title'])->toBeNull();
});

test('it converts to array', function () {
    $item = new ProgressbarItem([
        'step' => 1,
        'title' => 'Test',
        'description' => 'Desc',
        'url' => '/test',
        'canJumpAhead' => true,
    ]);

    expect($item->toArray())->toBe([
        'step' => 1,
        'title' => 'Test',
        'description' => 'Desc',
        'url' => '/test',
        'canJumpAhead' => true,
    ]);
});

test('it converts to json', function () {
    $item = new ProgressbarItem(['step' => 1, 'title' => 'Test']);

    $json = $item->toJson();
    $decoded = json_decode($json, true);

    expect($decoded)->toBe(['step' => 1, 'title' => 'Test']);
});

test('it is json serializable', function () {
    $item = new ProgressbarItem(['step' => 1, 'title' => 'Test']);

    expect(json_encode($item))->toBe('{"step":1,"title":"Test"}');
});

test('it handles empty input gracefully', function () {
    $item = new ProgressbarItem([]);

    expect($item->toArray())->toBe([]);
    expect($item->step)->toBeNull();
    expect($item->title)->toBeNull();
});

test('fill returns self for chaining', function () {
    $item = new ProgressbarItem;
    $result = $item->fill(['step' => 1]);

    expect($result)->toBe($item);
});
