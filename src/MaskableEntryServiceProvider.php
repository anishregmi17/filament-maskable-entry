<?php

namespace Anish\MaskableEntry;

use Anish\MaskableEntry\Components\MaskableEntry;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * MaskableEntryServiceProvider
 *
 * Service provider for the Filament Maskable Entry package.
 * Registers views and components for the package.
 */
class MaskableEntryServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     *
     * @param  Package  $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('maskable-entry')
            ->hasViews()
            ->hasViewComponent('maskable-entry', MaskableEntry::class);
    }

    /**
     * Bootstrap the package services.
     *
     * @return void
     */
    public function packageBooted(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'maskable-entry'
        );
    }
}
