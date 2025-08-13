<?php

define('ADMIN_ROLE', 'admin');
define('CUSTOMER_ROLE', 'customer');
define('TABLE_PAGE_LENGTH', 15);

if (!function_exists('table_image')) {
    function table_image($path, $name, $class = null, $style = null){
        $style_data = $style != null ? $style : 'width: 35px';
        return $path ? "<img src='".file_path($path)."' class='".$class."' alt='".$name."' style='".$style_data."'/>"
        : "<img src='".asset('/')."assets/img/default.svg' alt='".$name."' style='width:35px;'/>";
    }
}

if(!function_exists('user_image')){
    function user_image(){
        return auth()->user()->image ? file_path(auth()->user()->image) : "https://ui-avatars.com/api/?name=".auth()->user()->full_name."&size=64&rounded=true&color=fff&background=F97C4F";
    }
}

if (!function_exists('file_path')) {
    function file_path($path, $disk = 'public'){
        return asset($path);
    }
}
