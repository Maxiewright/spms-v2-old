<?php

/**
 * Displays the delete confirmation for all components
 */
if (!function_exists('confirmDelete')) {
    function showDeleteConfirmation($id)
    {
        return [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method' => 'destroy',
            'params' => $id,
        ];
    }
}

/**
 * Displays the success alert
 */
if (!function_exists('showDeleteAlert')) {
    function showDeleteAlert($title)
    {
        return [
            'icon' => 'info',
            'title' => ucfirst($title) . ' Field Was Remove.',
            'timeout' => 5000
        ];
    }
}

/**
 * Displays the success alert
 */
if (!function_exists('showSuccessAlert')) {
    function showSuccessAlert($id, $title)
    {
        return [
            'icon' => 'success',
            'title' => $id
                ? ucfirst($title) . ' Updated Successfully.'
                : ucfirst($title) . ' Created Successfully.',
            'timeout' => 5000
        ];
    }
}

if (!function_exists('openModal')) {
    function openModal()
    {

    }
}

