<?php

if (!function_exists('time_now_to_string')) {
    function time_now_to_string($format = 'Y-m-d H:i:s')
    {
        // Use the Time class to get the current time
        $currentTime = \CodeIgniter\I18n\Time::now();

        // Format the current time to a string
        return $currentTime->format($format);
    }
}