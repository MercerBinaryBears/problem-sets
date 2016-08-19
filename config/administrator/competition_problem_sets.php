<?php
return [
    'title' => 'Old Competition Problem Sets',
  
    'single' => 'Competition Problem Set',

    'model' => 'App\CompetitionProblemSet',

    'columns' => [
        'name' => [
            'title' => 'Name'
        ],
        'id' => array(
            'title' => 'Preview',
            'output' => function($id) {
                $url = "/competitions/$id/pdf";
                return "<button class='toggle-button' data-url='$url' data-show-text='Show' data-hide-text='Hide'>Show</button>";
            }
        ),
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
