<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\View\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;
use Illuminate\View\View;

class MultiStepProgressbar extends Component
{
    public $canJumpToStep = 0;
    public $currentStep;
    public $stepData;
    public $steps;

    public function __construct(Model $model = null)
    {
        $this->canJumpToStep = 1;
        $this->model = $model;
        $this->currentStep = request("step", 1);
        $this->stepData = $stepData;

        for ($step = 1; $step <= count($this->stepData); $step++) {
            if ($this->stepData["step-{$step}"]["canJumpAhead"] ?? false) {
                $this->canJumpToStep = $step;
            }
        }

        $this->steps = count($this->stepData);
    }

    public function render() : View
    {
        return view('genealabs-laravel-multi-step-progressbar::components.multi-step-progressbar');
    }
}
