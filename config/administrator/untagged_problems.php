<?php
return array(
    'title' => 'Untagged Problems',

    'single' => 'Untagged Problem',

    'model' => 'App\Problem',

    'query_filter' => function ($query) {
        // select problems.* from problems left join problem_tag on problems.id = problem_id where tag_id IS NULL;
        return $query->leftJoin('problem_tag', 'problems.id', '=', 'problem_tag.problem_id')
            ->whereNull('problem_tag.tag_id');
    },

    'columns' => array(
        'name' => array(
            'title' => 'Name'
        ),
        'competitionProblemSet' => array(
            'title' => 'Competition',
            'relationship' => 'competitionProblemSet',
            'select' => 'name'
        )
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
        )
    ),

    'action_permissions' => array(
        'create' => false,
        'delete' => false,
        'update' => true,
        'view' => true,
    ),

    'actions' => array(
        'view_pdf' => array(
            'title' => 'View PDF',
            'messages' => array(
            ),
            'action' => function($problem) {
                return Redirect::to("/problems/{$problem->id}/pdf");
            },
        ),
    ),
);
