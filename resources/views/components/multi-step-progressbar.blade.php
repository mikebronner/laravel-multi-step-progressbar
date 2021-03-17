<div
    class="mt-0 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 mb-12 flex"
>
    <div
        class="relative w-full flex flex-grow justify-center"
    >

        @for ($step = 1; $step <= $steps; $step++)
            <x-multi-step-progressbar-item
                {{ $attributes }}
                :currentStep="$currentStep"
                :step="$step"
                :steps="$steps"
                :canJumpToStep="$canJumpToStep"
                :stepData="$stepData"
            />
        @endfor

    </div>
</div>
