<?php
// app/Helpers/ImageHelper.php
function blogImage($image, $title = 'Default Image')
{
    $path = public_path('uploads/blogs/' . $image);
    if (!$image) {
        return ['src' => asset('assets/default_images/placeholder.png'), 'alt' => 'No Image'];
    } elseif (!file_exists($path)) {
        return ['src' => asset('assets/default_images/placeholder.png'), 'alt' => 'File not found'];
    } else {
        return ['src' => asset('uploads/blogs/' . $image), 'alt' => $title];
    }
}

function userImage($image, $name = 'Default User')
{
    $path = public_path('uploads/users/' . $image);
    if (!$image) {
        return ['src' => asset('assets/default_images/user.jpg'), 'alt' => 'No Image'];
    } elseif (!file_exists($path)) {
        return ['src' => asset('assets/default_images/user.jpg'), 'alt' => 'File not found'];
    } else {
        return ['src' => asset('uploads/users/' . $image), 'alt' => $name];
    }
}

function photoImage($image, $title = 'Default Image')
{
    $path = public_path('uploads/photos/' . $image);
    if (!$image) {
        return ['src' => asset('assets/default_images/placeholder.png'), 'alt' => 'No Image'];
    } elseif (!file_exists($path)) {
        return ['src' => asset('assets/default_images/placeholder.png'), 'alt' => 'File not found'];
    } else {
        return ['src' => asset('uploads/photos/' . $image), 'alt' => $title];
    }
}