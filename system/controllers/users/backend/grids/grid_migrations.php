<?php

function grid_migrations($controller){

    $options = array(
        'is_filter' => false
    );

    $columns = array(
        'id' => array(
            'title' => 'id',
            'width' => 30,
        ),
        'title' => array(
            'title' => LANG_USERS_MIG_TITLE,
            'href' => href_to($controller->root_url, 'migrations_edit', array('{id}')),
        ),
        'passed_days' => array(
            'title' => LANG_USERS_MIG_PASSED_DAYS,
            'handler' => function($val){
                return $val ? $val : '&mdash;';
            }
        ),
        'rating' => array(
            'title' => LANG_RATING,
            'handler' => function($val){
                return $val ? $val : '&mdash;';
            }
        ),
        'karma' => array(
            'title' => LANG_KARMA,
            'handler' => function($val){
                return $val ? $val : '&mdash;';
            }
        ),
        'is_active' => array(
            'title' => LANG_ON,
            'flag'  => true,
            'width' => 60,
            'flag_toggle' => href_to($controller->root_url, 'toggle_item', array('{id}', '{users}_groups_migration', 'is_active'))
        ),
    );

    $actions = array(
        array(
            'title' => LANG_EDIT,
            'class' => 'edit',
            'href' => href_to($controller->root_url, 'migrations_edit', array('{id}')),
        ),
        array(
            'title' => LANG_DELETE,
            'class' => 'delete',
            'href' => href_to($controller->root_url, 'migrations_delete', array('{id}')),
            'confirm' => LANG_USERS_MIG_DELETE_CONFIRM
        )
    );

    return array(
        'options' => $options,
        'columns' => $columns,
        'actions' => $actions
    );

}

