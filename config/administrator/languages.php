<?php

return array(
    'title' => 'Languages',

    'single' => 'Language',

    'model' => 'App\Language',

    'columns' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'color' => array(
            'title' => 'Color',
            'output' => function($value) {
                return "<div style='height:20px;width:20px;border-radius:3px;background-color:$value;'></div>";
            }
        ),
    ),

    'filters' => array(
        'name' => array(
            'title' => 'Name',
        ),
    ),

    'edit_fields' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'color' => array(
            'title' => 'Color',
            'type' => 'color'
        ),
    ),
);
