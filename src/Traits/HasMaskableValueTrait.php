<?php

namespace Anish\MaskableEntry\Traits;

use Closure;

trait HasMaskableValueTrait
{
    protected string|Closure|null $actualValue = null;

    protected ?string $maskValue = null;

    protected string $maskingChar = 'X';

    public function actualValue(string|Closure|null $value): static
    {
        $this->actualValue = $value;

        return $this;
    }

    public function maskValue(string $value): static
    {
        $this->maskValue = $value;

        return $this;
    }

    public function getActualValue(): ?string
    {
        return $this->evaluate($this->actualValue);
    }

    /**
     * @return array{regex: string, replacement: string}
     */
    protected function inferFormatPattern(): array
    {
        $pattern = $this->maskValue ?? '';
        preg_match_all('/' . $this->maskingChar . '+|[^' . $this->maskingChar . ']/', $pattern, $matches);
        $groups = $matches[0];

        $regexParts = [];
        $replacementParts = [];
        $groupIndex = 1;

        foreach ($groups as $group) {
            if (str_starts_with($group, $this->maskingChar)) {
                $length = strlen($group);
                $regexParts[] = "(\d{{$length}})";
                $replacementParts[] = '$' . $groupIndex++;
            } else {
                $replacementParts[] = $group;
            }
        }

        return [
            'regex' => '/' . implode('', $regexParts) . '/',
            'replacement' => implode('', $replacementParts),
        ];
    }

    public function getFormattedValue(): string
    {
        $value = $this->getActualValue();

        if (! $value || ! $this->maskValue) {
            return 'N/A';
        }

        $pattern = $this->inferFormatPattern();

        return preg_replace($pattern['regex'], $pattern['replacement'], $value) ?? $value;
    }

    public function getMaskedValue(): string
    {
        return $this->getActualValue() && $this->maskValue
            ? $this->maskValue
            : 'N/A';
    }
}
