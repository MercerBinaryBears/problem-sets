<?php
return array(
    'title' => 'Solutions',

    'single' => 'Solution',

    'model' => 'App\Solution',

    'columns' => array(
        'problem' => array(
            'title' => 'Problem',
            'relationship' => 'problem',
            'select' => 'name',
        ),

        'language' => array(
            'title' => 'Language',
            'relationship' => 'language',
            'select' => 'name'
        ),
    ),

    'filter' => array(
        'problem' => array(
            'title' => 'Problem',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'language' => array(
            'title' => 'Language',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
    ),

    'edit_fields' => array(
        'problem' => array(
            'title' => 'Problem',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'language' => array(
            'title' => 'Language',
            'type' => 'relationship',
            'name_field' => 'name'
        ),

        'code' => array(
            'title' => 'Code',
            'type' => 'textarea',
        ),
    ),
);
