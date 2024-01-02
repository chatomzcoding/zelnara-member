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

if (! function_exists('data_label')) {
    function data_label() {
        $data = [
            'link-tema',
        ];
        return $data;
    }
}