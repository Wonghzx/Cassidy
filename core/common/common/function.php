<?php
/**
 * [function.php name]
 * @author wong <[842687571@qq.com]>
 * Date: 03/09/17
 * Time: 下午3:28
 * @return    [type]    PhpStorm  MyFrame
 */
if (!function_exists('p')) {
    function p($val)
    {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
    }
}