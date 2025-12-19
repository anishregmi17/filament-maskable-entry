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
     * The icon to show when value is masked.
     */
    protected string $showIcon = 'heroicon-o-eye';

    /**
     * The icon to show when value is revealed.
     */
    protected string $hideIcon = 'heroicon-o-eye-slash';

    /**
     * Initialize the component with config defaults.
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (function_exists('config')) {
            $this->isToggleable = config('maskable-entry.toggleable', true);
            $this->showIcon = config('maskable-entry.icons.show', 'heroicon-o-eye');
            $this->hideIcon = config('maskable-entry.icons.hide', 'heroicon-o-eye-slash');
            $this->maskingChar = config('maskable-entry.masking_char', 'X');
            $this->emptyStateText = config('maskable-entry.empty_state_text', 'N/A');
        }
    }

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

    /**
     * Set the icon to display when value is masked.
     *
     * @param  string  $icon  The icon name
     * @return static
     */
    public function showIcon(string $icon): static
    {
        $this->showIcon = $icon;

        return $this;
    }

    /**
     * Set the icon to display when value is revealed.
     *
     * @param  string  $icon  The icon name
     * @return static
     */
    public function hideIcon(string $icon): static
    {
        $this->hideIcon = $icon;

        return $this;
    }

    /**
     * Get the icon to display when value is masked.
     *
     * @return string
     */
    public function getShowIcon(): string
    {
        return $this->showIcon;
    }

    /**
     * Get the icon to display when value is revealed.
     *
     * @return string
     */
    public function getHideIcon(): string
    {
        return $this->hideIcon;
    }
}
