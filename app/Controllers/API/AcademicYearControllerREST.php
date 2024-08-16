<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;

class AcademicYearControllerREST extends ResourceController
{
    public function index()
    {
        $currentYear = date('Y');  // Get the current year
        $startYear = $currentYear - 4;  // Start 4 years before the current year
        $endYear = $currentYear;  // End at the current year

        $years = [];
        for ($i = $startYear; $i < $endYear; $i++) {
            $years[] = "{$i}-" . ($i + 1);
        }

      
        return $this->respond(['academic_year' => implode(', ', $years)], 200);
    }
}
