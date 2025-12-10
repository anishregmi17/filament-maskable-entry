<?php

namespace Anish\MaskableEntry\Components;

use Filament\Infolists\Components\TextEntry;
use Anish\MaskableEntry\Traits\HasMaskableValueTrait;


class MaskableEntry extends TextEntry
{
    use HasMaskableValueTrait;

    protected string $view = 'maskable-entry::components.maskable-entry';

    
    protected bool|Closure $isToggleable = true;

    public function toggleable(bool|Closure $condition = true): static
    {
        $this->isToggleable = $condition;

        return $this;
    }

    public function isToggleable(): bool
    {
        return $this->evaluate($this->isToggleable);
    }
}
