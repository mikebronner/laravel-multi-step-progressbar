<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class MultiStepProgressbar extends Component
{
    public $canJumpToStep = 0;
    public $currentStep;
    public $stepData;
    public $steps;

    public function __construct(Model $model = null, Collection $stepData = null)
    {
        $this->canJumpToStep = 1;
        $this->model = $model;
        $this->currentStep = request("step", 1);
        $this->stepData = $stepData
            ->keyBy("step")
            ->sortBy("step");

        foreach ($this->stepData as $step) {
            if ($step->can_jump_ahead ?? false) {
                $this->canJumpToStep = $step->step;
            }
        }

        $this->steps = count($this->stepData);
    }

    public function render(): View
    {
        return view('genealabs-laravel-multi-step-progressbar::components.multi-step-progressbar');
    }
}
