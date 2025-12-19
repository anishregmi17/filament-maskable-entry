<?php

namespace Anish\MaskableEntry\Components;

use Anish\MaskableEntry\Traits\HasMaskableValueTrait;
use Closure;
use Filament\Infolists\Components\TextEntry;

/**
 * MaskableEntry Component
 *
 * A Filament infolist component for displaying sensitive information with masking capability.
 * Extends TextEntry to provide toggleable visibility for sensitive data like passwords,
 * credit cards, SSN, API keys, etc.
 *
 * @method static static make(string $name)
 */
class MaskableEntry extends TextEntry
{
    use HasMaskableValueTrait;

    /**
     * The view to render the component.
     */
    protected string $view = 'maskable-entry::components.maskable-entry';

    /**
     * Whether the value can be toggled between masked and revealed states.
     */
    protected bool|Closure $isToggleable = true;

    /**
     * Set whether the value can be toggled between masked and revealed states.
     *
     * @param  bool|Closure  $condition  Whether toggling is enabled
     * @return static
     */
    public function toggleable(bool|Closure $condition = true): static
    {
        $this->isToggleable = $condition;

        return $this;
    }

    /**
     * Determine if the value is toggleable.
     *
     * @return bool
     */
    public function isToggleable(): bool
    {
        return $this->evaluate($this->isToggleable);
    }
}
