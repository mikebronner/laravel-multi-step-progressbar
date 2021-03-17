<?php

namespace GeneaLabs\LaravelMultiStepProgressbar;

use Jenssegers\Model\Model;

class ProgressbarItem extends Model
{
    protected $canJumpAhead;
    protected $description;
    protected $step;
    protected $title;
    protected $url;

    protected $appends = [
        "canJumpAhead",
        "description",
        "step",
        "title",
        "url",
    ];
    protected $fillable = [
        "canJumpAhead",
        "description",
        "step",
        "title",
        "url",
    ];

    public function getCanJumpAheadAttribute(): bool
    {
        return $this->canJumpAhead;
    }

    public function getDescriptionAttribute(): string
    {
        return $this->description;
    }

    public function getStepAttribute(): int
    {
        return $this->step;
    }

    public function getTitleAttribute(): string
    {
        return $this->title;
    }

    public function getUrlAttribute(): string
    {
        return $this->url;
    }

    public function setCanJumpAheadAttribute(bool $canJumpAhead): void
    {
        $this->canJumpAhead = $canJumpAhead;
    }

    public function setDescriptionAttribute(string $description): void
    {
        $this->description = $description;
    }

    public function setStepAttribute(int $step): void
    {
        $this->step = $step;
    }

    public function setTitleAttribute(string $title): void
    {
        $this->title = $title;
    }

    public function setUrlAttribute(string $url): void
    {
        $this->url = $url;
    }
}
