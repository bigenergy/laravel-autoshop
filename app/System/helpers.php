<?php
/**
 * Set active link menu
 * @param string $path - path of link
 * @param string $active - class of active element
 * @return string
 */
function set_active($path, $active = 'active')
{
    return call_user_func_array('\Request::is', (array)$path) ? $active : '';
}