<?php

namespace GeneaLabs\LaravelMultiStepProgressbar\View\Composers;

use Illuminate\View\View;

class MultiStepProgressbarComposer
{
    public function compose(View $view)
    {
        $currentStep = request("step", 1);

        $view->with(compact(
            "currentStep"
        ));
    }
}
