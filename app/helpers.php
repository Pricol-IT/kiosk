<?php 
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

if (!function_exists('uploadImage')) {
    function uploadImage($file, $path)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/' . $path . '/'), $fileName);

        return "$path/" . $fileName;
    }
}