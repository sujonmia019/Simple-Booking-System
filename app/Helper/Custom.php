<?php

use Illuminate\Support\Facades\Storage;

define('AVATAR_PATH', 'avatar');
define('ADMIN_ROLE', 'admin');
define('CUSTOMER_ROLE', 'customer');
define('TABLE_PAGE_LENGTH', 15);
define('ACTIVE_STATUS', 1);
define('INACTIVE_STATUS', 1);
define('STATUS', [
    1 => 'Active',
    2 => 'Inactive'
]);
define('STATUS_LABEL', [
    1 => '<span class="badge badge-sm bg-success rounded-0">Active</span>',
    2 => '<span class="badge badge-sm bg-danger rounded-0">Inactive</span>'
]);
define('BOOKING_STATUS', [
    1 => 'Pending',
    2 => 'Confirmed',
    3 => 'Cancelled'
]);
define('BOOKING_STATUS_LABEL', [
    1 => '<span class="badge bg-warning text-dark fw-normal">Pending</span>',
    2 => '<span class="badge bg-success fw-normal">Confirmed</span>',
    3 => '<span class="badge bg-danger fw-normal">Cancelled</span>'
]);
define('BOOKING_STATUS_COLORS', [
    1 => '#facc15', // Pending
    2 => '#22c55e', // Confirmed
    3 => '#ef4444', // Cancelled
]);

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
        return Storage::disk($disk)->url($path);
    }
}

if(!function_exists('date_formated')){
    function date_formated($date, $format = 'Y-m-d h:i A'){
        return date($format, strtotime($date));
    }
}

if (!function_exists('getStatusColor')) {
    function getStatusColor($status)
    {
        return match ($status) {
            \App\Models\Booking::STATUS_PENDING   => '#facc15', // yellow
            \App\Models\Booking::STATUS_CONFIRMED => '#22c55e', // green
            \App\Models\Booking::STATUS_COMPLETED => '#3b82f6', // blue
            \App\Models\Booking::STATUS_CANCELED  => '#ef4444', // red
            default => '#ddd',
        };
    }
}
