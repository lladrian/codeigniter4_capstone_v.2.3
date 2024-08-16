<?php

//$file = FCPATH . 'uploads/'.$file_name;+
$file = 'C:/xampp/htdocs/system-integration-codeigniter4-2024/public/uploads/asdasdred/Assignment_Manatad,A (2).docx';

//$file = FCPATH . 'uploads/'.'1708040946_637efc3e15b19663d5dd.pdf';
//$filename = '1708040946_637efc3e15b19663d5dd.pdf';

// Send headers to the browser
header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
//header('Content-Disposition: inline; filename="' . $filename . '"');
// header('Content-Disposition: inline; filename="file.docx"'); // Change the filename as needed
// header('Content-Transfer-Encoding: binary');
// header('Accept-Ranges: bytes');

// Output the PDF file
@readfile($file);

?>

