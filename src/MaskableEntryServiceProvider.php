<?php

namespace Anish\MaskableEntry;

use Spatie\LaravelPackageTools\Package;
use Anish\MaskableEntry\Components\MaskableEntry;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MaskableEntryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('maskable-entry')
            ->hasViews()
            ->hasViewComponent('maskable-entry', MaskableEntry::class);
    }

    public function packageBooted(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'maskable-entry'
        );
    }
}
