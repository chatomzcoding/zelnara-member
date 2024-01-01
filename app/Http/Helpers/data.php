<?php 
// CORE --------------------------------------------

if (! function_exists('data_level')) {
    function data_level()
    {
        $data = [
            'basic',
            'premium'
        ];
        return $data;
    }
}