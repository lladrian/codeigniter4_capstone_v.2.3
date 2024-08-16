<?php

//$file = FCPATH . 'uploads/'.$file_name;+
$file = 'C:/xampp/htdocs/system-integration-codeigniter4-2024/public/uploads/1708059082_c203cdad8d3017f3e5b4.rar';

// Determine the file extension
$extension = pathinfo($file, PATHINFO_EXTENSION);

// Set the appropriate content type based on the file extension
switch ($extension) {
    case 'zip':
        $content_type = 'application/octet-stream';
       // $content_type = 'application/zip';
        break;
    case 'rar':
        $content_type = 'application/octet-stream';
        //$content_type = 'application/x-rar-compressed';
        break;
    default:
        $content_type = 'application/octet-stream';
        // Unsupported file type, handle accordingly
        exit('Unsupported file type');
}

// Send headers to the browser
header('Content-Type: ' . $content_type);
// header('Content-Length: ' . filesize($file));


// Output the image file
readfile($file);


?>