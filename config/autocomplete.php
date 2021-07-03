<?php

return [
    'options' => [
        'id' => 'id',
        'text' => 'text',
        'auto_select' => true,
        'allow_new' => true,
        'load_once_on_focus' => true,
        'inline' => false,
        'inline_styles' => 'relative',
        'overlay_styles' => 'absolute z-30',
        'result_focus_styles' => 'bg-blue-500',
    ],

    'components' => [
        'input' => 'input',
        'dropdown' => 'dropdown',
        'prompt' => 'prompt',
        'loading' => 'loading',
        'results_container' => 'results-container',
        'no_results' => 'no-results',
        'add_new_row' => 'add-new-row',
        'result_row' => 'result-row',
    ],

    // Set this to true if you would prefer it to use the global namespace <x-autocomplete />
    'use_global_namespace' => false,
];
