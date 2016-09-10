<?php

return array(
    'title' => 'Practice Problem Sets',

    'single' => 'Practice Problem Set',

    'model' => 'App\PracticeProblemSet',

    'columns' => array(
        'name' => array(
            'title' => 'Name',
        ),
    ),

    'filters' => array(
        'name' => array(
            'title' => 'Name'
        )
    ),

    'edit_fields' => array(
        'name' => array(
            'title' => 'Name'
        ),

        'problems' => array(
            'title' => 'Problems',
            'type' => 'relationship',
            'name_field' => 'name'
        )
    ),

    'actions' => array(
        'regenerate_pdf' => array(
            'title' => 'Regenerate PDF',
            'messages' => array(
                'active' => 'Rebuilding PDF...',
                'success' => 'PDF Rebuilt!',
                'error' => 'PDF failed to rebuild.'
            ),
            'action' => function($practice) {
                Artisan::call('pdf:join:practice', ['practice_id' => $practice->id]);
                return true;
            },
        ),
        'view_pdf' => array(
            'title' => 'View PDF',
            'messages' => array(
            ),
            'action' => function($problem_set) {
                return Redirect::to("/problem_sets/{$problem_set->id}/pdf");
            },
        ),
    ),
);
