<?php

    if (! function_exists('confirmDelete')){
        function showDeleteConfirmation($id)
        {
            return [
                'type'        => 'warning',
                'title'       => 'Are you sure?',
                'text'        => "You won't be able to revert this!",
                'confirmText' => 'Yes, delete!',
                'method'      =>  'destroy',
                'params'      => $id,
            ];
        }
    }
