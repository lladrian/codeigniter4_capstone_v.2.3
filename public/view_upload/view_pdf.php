<?php

$file = 'C:\xampp\htdocs\deploy-test-system-integration-codeigniter_4.4.5_2024\public\uploads/team_coa/asdasdasdas/Doc1.pdf';


header('Content-type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

@readfile($file);
?>