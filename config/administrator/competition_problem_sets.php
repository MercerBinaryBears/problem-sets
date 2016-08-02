<?php
return [
    'title' => 'Old Competition Problem Sets',
  
    'single' => 'Competition Problem Set',

    'model' => 'App\CompetitionProblemSet',

    'columns' => [
        'name' => [
            'title' => 'Name'
        ]
    ],

    'filters' => [
        'name' => [
            'title' => 'Name',
            'type' => 'text'
        ]
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Name',
            'type' => 'text',
        ],

        'filename' => [
            'title' => 'File',
            'type' => 'file',
            'location' => storage_path() . '/uploads/',
            'naming' => 'random',
            'length' => 20,
            'mimes' => 'pdf'
        ],
    ]
];
