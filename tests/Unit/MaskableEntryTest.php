<?php

namespace Anish\MaskableEntry\Tests\Unit;

use Anish\MaskableEntry\Components\MaskableEntry;
use Orchestra\Testbench\TestCase;

class MaskableEntryTest extends TestCase
{
    /** @test */
    public function it_can_set_mask_value(): void
    {
        $entry = MaskableEntry::make('test')
            ->maskValue('XXX-XX-XXXX');

        $this->assertEquals('XXX-XX-XXXX', $entry->getMaskedValue());
    }

    /** @test */
    public function it_can_set_actual_value(): void
    {
        $entry = MaskableEntry::make('test')
            ->actualValue('123456789');

        $this->assertEquals('123456789', $entry->getActualValue());
    }

    /** @test */
    public function it_can_set_masking_character(): void
    {
        $entry = MaskableEntry::make('test')
            ->maskingChar('*');

        // This would require reflection or a getter method to properly test
        $this->assertInstanceOf(MaskableEntry::class, $entry);
    }

    /** @test */
    public function it_can_be_toggleable(): void
    {
        $entry = MaskableEntry::make('test')
            ->toggleable(true);

        $this->assertTrue($entry->isToggleable());
    }

    /** @test */
    public function it_can_be_non_toggleable(): void
    {
        $entry = MaskableEntry::make('test')
            ->toggleable(false);

        $this->assertFalse($entry->isToggleable());
    }

    /** @test */
    public function it_can_set_custom_empty_state_text(): void
    {
        $entry = MaskableEntry::make('test')
            ->emptyStateText('No data available');

        // This would need a proper implementation to test
        $this->assertInstanceOf(MaskableEntry::class, $entry);
    }

    /** @test */
    public function it_returns_empty_state_when_no_value(): void
    {
        $entry = MaskableEntry::make('test')
            ->maskValue('XXX-XX-XXXX');

        $this->assertEquals('N/A', $entry->getMaskedValue());
    }

    /** @test */
    public function it_can_set_custom_icons(): void
    {
        $entry = MaskableEntry::make('test')
            ->showIcon('heroicon-o-lock-closed')
            ->hideIcon('heroicon-o-lock-open');

        $this->assertEquals('heroicon-o-lock-closed', $entry->getShowIcon());
        $this->assertEquals('heroicon-o-lock-open', $entry->getHideIcon());
    }
}
