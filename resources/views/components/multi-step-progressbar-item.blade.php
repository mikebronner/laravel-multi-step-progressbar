<div
    class="relative w-full flex flex-grow justify-center"
>
    <div
        class="absolute w-1/2 h-full left-0 bg-repeat-x bg-top top-0"
        style="background-image: url({{ $imageForLeftBar }}); background-repeat: repeat-x;"
    ></div>
    <div
        class="absolute w-1/2 h-full bg-repeat-x bg-top top-0"
        style="left: 50%; background-image: url({{ $imageForRightBar }}); background-repeat: repeat-x;"
    ></div>
    <div
        {{ $attributes->merge(["class" => 'flex flex-col items-center justify-start z-10'])}}
    >
        @if ($step <= $canJumpToStep && $step !== $currentStep)
            <a
                aria-label="{{ $stepData->get($step)->title }}"
                data-balloon-pos="down"
                href="{{ $stepData->get($step)->url }}"
            >
                <img src="{{ $imageForBubble }}">
            </a>
        @elseif ($step !== $currentStep)
            <div
                aria-label="{{ $stepData->get($step)->title }}"
                data-balloon-pos="down"
                style="cursor: default !important;"
            >
                <img src="{{ $imageForBubble }}">
            </div>
        @else
            <img
                src="{{ $imageForBubble }}"
                class="z-10"
            >
        @endif

        @if ($step == $currentStep)
            <div
                class="m-0 p-0 whitespace-no-wrap font-bold"
            >
                {{ $stepData->get($step)->title }}
            </div>
            <p
                class="m-0 p-0 text-sm italic"
            >
                {{ $stepData->get($step)->description }}
            </p>
        @endif
    </div>
</div>
