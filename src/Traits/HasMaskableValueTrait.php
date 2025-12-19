<?php

namespace Anish\MaskableEntry\Traits;

use Closure;

trait HasMaskableValueTrait
{
    /**
     * The actual value to be revealed when toggled.
     */
    protected string|Closure|null $actualValue = null;

    /**
     * The mask pattern to display when value is hidden.
     */
    protected ?string $maskValue = null;

    /**
     * The character used for masking in the pattern.
     */
    protected string $maskingChar = 'X';

    /**
     * The placeholder text shown when no value is available.
     */
    protected string $emptyStateText = 'N/A';

    /**
     * Set the actual value to be revealed when toggled.
     *
     * @param  string|Closure|null  $value  The actual value or a closure that returns the value
     * @return static
     */
    public function actualValue(string|Closure|null $value): static
    {
        $this->actualValue = $value;

        return $this;
    }

    /**
     * Set the mask pattern to display when value is hidden.
     *
     * @param  string  $value  The mask pattern (e.g., 'XXX-XX-XXXX')
     * @return static
     */
    public function maskValue(string $value): static
    {
        $this->maskValue = $value;

        return $this;
    }

    /**
     * Set the character used for masking in the pattern.
     *
     * @param  string  $char  The masking character (default: 'X')
     * @return static
     */
    public function maskingChar(string $char): static
    {
        $this->maskingChar = $char;

        return $this;
    }

    /**
     * Set the placeholder text shown when no value is available.
     *
     * @param  string  $text  The placeholder text (default: 'N/A')
     * @return static
     */
    public function emptyStateText(string $text): static
    {
        $this->emptyStateText = $text;

        return $this;
    }

    /**
     * Get the actual unmasked value.
     *
     * @return string|null
     */
    public function getActualValue(): ?string
    {
        return $this->evaluate($this->actualValue);
    }

    /**
     * Infer the format pattern from the mask value.
     *
     * This method analyzes the mask pattern and creates a regex pattern
     * and replacement string to format the actual value.
     *
     * @return array{regex: string, replacement: string}
     */
    protected function inferFormatPattern(): array
    {
        $pattern = $this->maskValue ?? '';
        preg_match_all('/' . preg_quote($this->maskingChar, '/') . '+|[^' . preg_quote($this->maskingChar, '/') . ']/', $pattern, $matches);
        $groups = $matches[0];

        $regexParts = [];
        $replacementParts = [];
        $groupIndex = 1;

        foreach ($groups as $group) {
            if (str_starts_with($group, $this->maskingChar)) {
                $length = strlen($group);
                $regexParts[] = "(.{{$length}})";
                $replacementParts[] = '$' . $groupIndex++;
            } else {
                $replacementParts[] = preg_quote($group, '/');
            }
        }

        return [
            'regex' => '/' . implode('', $regexParts) . '/',
            'replacement' => implode('', $replacementParts),
        ];
    }

    /**
     * Get the formatted value with mask pattern applied.
     *
     * @return string
     */
    public function getFormattedValue(): string
    {
        $value = $this->getActualValue();

        if (! $value || ! $this->maskValue) {
            return $this->emptyStateText;
        }

        $pattern = $this->inferFormatPattern();

        return preg_replace($pattern['regex'], $pattern['replacement'], $value) ?? $value;
    }

    /**
     * Get the masked value to display when hidden.
     *
     * @return string
     */
    public function getMaskedValue(): string
    {
        return $this->getActualValue() && $this->maskValue
            ? $this->maskValue
            : $this->emptyStateText;
    }
}
