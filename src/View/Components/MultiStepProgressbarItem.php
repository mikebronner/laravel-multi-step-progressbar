<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class MultiStepProgressbarItem extends Component
{
    public $canJumpToStep;
    public $currentStep;
    public $step;
    public $stepData;
    public $steps;
    protected $images = [];

    public function __construct(
        string $currentStep = "1",
        string $step = "1",
        string $steps = "1",
        string $canJumpToStep = "0",
        Collection $stepData = null
    ) {
        $this->canJumpToStep = intval($canJumpToStep);
        $this->currentStep = intval($currentStep);
        $this->step = intval($step);
        $this->steps = intval($steps);
        $this->stepData = $stepData;
        $this->images = config("genealabs-laravel-multi-step-progressbar.sprites");
    }

    public function imageForLeftBar(): string
    {
        $state = $this->isFirstItem()
            ? "hidden"
            : ($this->isPreviousItem()
                ? "visited"
                : "unvisited");

        return $this->images[$state]["bar"];
    }

    public function imageForBubble(): string
    {
        $position = $this->isFirstItem()
            ? "first"
            : ($this->isLastItem()
                ? "last"
                : "middle");

        $state = $this->isMaxProgressedEditedItem()
            ? "max-visited"
            : ($this->isMaxProgressedCurrentItem()
                ? "max-active"
                : ($this->isVisitedItem()
                    ? "visited"
                    : ($this->isPreviouslyEditedCurrentItem()
                        ? $state = "active"
                        : "unvisited")));

        return $this->images[$state]["{$position}-pip"];
    }

    public function imageForRightBar(): string
    {
        $state = $this->isLastItem()
            ? "hidden"
            : ($this->isFutureItem()
                ? "unvisited"
                : "visited");

        return $this->images[$state]["bar"];
    }

    protected function isFirstItem(): bool
    {
        return $this->step === 1;
    }

    protected function isLastItem(): bool
    {
        return $this->step === $this->steps;
    }

    protected function isPreviousItem(): bool
    {
        return $this->step <= $this->canJumpToStep
            || $this->step <= $this->currentStep;
    }

    protected function isFutureItem(): bool
    {
        return $this->step >= $this->canJumpToStep
            && $this->step >= $this->currentStep;
    }

    protected function isVisitedItem(): bool
    {
        return $this->step <= $this->canJumpToStep
            && $this->step !== $this->currentStep;
    }

    protected function isMaxProgressedCurrentItem(): bool
    {
        return $this->currentStep >= $this->canJumpToStep
            && $this->currentStep === $this->step;
    }

    protected function isMaxProgressedEditedItem(): bool
    {
        return $this->currentStep < $this->canJumpToStep
            && $this->step === $this->canJumpToStep;
    }

    protected function isPreviouslyEditedCurrentItem(): bool
    {
        return $this->step === $this->currentStep
            && $this->step < $this->canJumpToStep;
    }

    public function render(): View
    {
        return view('genealabs-laravel-multi-step-progressbar::components.multi-step-progressbar-item');
    }
}
