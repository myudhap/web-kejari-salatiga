<?php

if (!function_exists('add_line_breaks')) {
    function add_line_breaks($string) {
        // Find the position of the first @ and #
        $first_at = strpos($string, '@');
        $first_hash = strpos($string, '#');

        // Determine the position to insert the break
        if ($first_at === false && $first_hash === false) {
            return $string; // No tags or hashtags found
        }

        // Find the minimum position
        $insert_position = min(array_filter([$first_at, $first_hash]));

        // Insert a line break at the determined position
        return substr($string, 0, $insert_position) . '<br><br>' . substr($string, $insert_position);
    }
}