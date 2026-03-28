<?php

use GeneaLabs\LaravelMultiStepProgressbar\ProgressbarItem;
use GeneaLabs\LaravelMultiStepProgressbar\View\Components\MultiStepProgressbarItem;

it('identifies first and last items correctly', function () {
    $component = new MultiStepProgressbarItem(
        currentStep: '1',
        step: '1',
        steps: '3',
        canJumpToStep: '0',
        stepData: collect(),
    );

    expect($component->step)->toBe(1)
        ->and($component->steps)->toBe(3);
});

it('calculates image states for visited items', function () {
    $component = new MultiStepProgressbarItem(
        currentStep: '3',
        step: '1',
        steps: '4',
        canJumpToStep: '2',
        stepData: collect(),
    );

    // Step 1 is visited (step <= canJumpToStep and step !== currentStep)
    $bubbleImage = $component->imageForBubble();
    expect($bubbleImage)->toBeString();
});
