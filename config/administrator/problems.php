<?php
return array(
    'title' => 'Problems',

    'single' => 'Problem',

    'model' => 'App\Problem',

    'columns' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'competitionProblemSet' => array(
            'title' => 'Competition',
            'relationship' => 'competitionProblemSet',
            'select' => 'name'
        ),
        'tags' => array(
            'title' => 'Tags',
            'relationship' => 'tags',
            'select' => 'GROUP_CONCAT((:table).name, ", ")'
        ),
        'id' => array(
            'title' => 'Preview',
            'output' => function($id) {
                $url = "/problems/$id/pdf";
                return "<iframe src='$url' height='300px' width='250px'></iframe>";
            }
        ),
    ),

    'filters' => array(
        'name' => array(
            'title' => 'Name',
            'type' => 'text'
        ),
        'competitionProblemSet' => array(
            'title' => 'Competition',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'tags' => array(
            'title' => 'Tags',
            'type' => 'relationship',
            'name_field' => 'name'
        )
    ),

    'edit_fields' => array(
        'name' => array(
            'title' => 'Name',
            'type' => 'text'
        ),
        'competitionProblemSet' => array(
            'title' => 'Competition Problem Set',
            'type' => 'relationship'
        ),
        'tags' => array(
            'title' => 'Tags',
            'type' => 'relationship',
            'name_field' => 'name'
        ),
        'start_page' => array(
            'title' => 'Start Page',
            'type' => 'number',
        ),
        'end_page' => array(
            'title' => 'Start Page',
            'type' => 'number',
        ),
        'sample_input' => array(
            'title' => 'Sample Input',
            'type' => 'textarea'
        ),
        'sample_output' => array(
            'title' => 'Sample Output',
            'type' => 'textarea'
        ),
        'judge_input' => array(
            'title' => 'Judge Input',
            'type' => 'textarea'
        ),
        'judge_output' => array(
            'title' => 'Judge Output',
            'type' => 'textarea'
        ),
    )
);
