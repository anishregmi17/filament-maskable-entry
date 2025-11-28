<?php

namespace Anish\MaskableEntry\Components;

use Filament\Infolists\Components\TextEntry;
use Anish\MaskableEntry\Traits\HasMaskableValueTrait;


class MaskableEntry extends TextEntry
{
    use HasMaskableValueTrait;

    protected string $view = 'maskable-entry::components.maskable-entry';
}
