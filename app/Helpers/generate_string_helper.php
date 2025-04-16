<?php

if (!function_exists('generate_random_string')) {
    function generate_random_string($length = 10, $upstring = false) {
        $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($upstring) {
            $string = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        return substr(str_shuffle(str_repeat($string, ceil($length/strlen($string)) )),1,$length);
    }    
}