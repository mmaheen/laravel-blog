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