<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Empty State Text
    |--------------------------------------------------------------------------
    |
    | This value determines the default text displayed when a maskable entry
    | has no value. You can override this per-component using the
    | emptyStateText() method.
    |
    */
    'empty_state_text' => env('MASKABLE_ENTRY_EMPTY_TEXT', 'N/A'),

    /*
    |--------------------------------------------------------------------------
    | Default Masking Character
    |--------------------------------------------------------------------------
    |
    | This character is used in mask patterns to represent masked values.
    | Common choices are 'X' or '*'. You can override this per-component
    | using the maskingChar() method.
    |
    */
    'masking_char' => env('MASKABLE_ENTRY_MASKING_CHAR', 'X'),

    /*
    |--------------------------------------------------------------------------
    | Default Toggleable State
    |--------------------------------------------------------------------------
    |
    | Determines if entries are toggleable by default. When false, the eye
    | icon won't be shown and values cannot be revealed. You can override
    | this per-component using the toggleable() method.
    |
    */
    'toggleable' => env('MASKABLE_ENTRY_TOGGLEABLE', true),

    /*
    |--------------------------------------------------------------------------
    | Toggle Icons
    |--------------------------------------------------------------------------
    |
    | Customize the icons used for toggling visibility. You can use any
    | Heroicons or custom icons supported by Filament.
    |
    */
    'icons' => [
        'show' => 'heroicon-o-eye',
        'hide' => 'heroicon-o-eye-slash',
    ],
];
