<?php
require_once 'Models/Dashboard.php';

class DashboardController
{
    public function getIndicators()
    {
 

        $dashboardModel = new Dashboard();
        $indicators = $dashboardModel->getIndicators();

        header('Content-Type: application/json');

        if (!empty($indicators)) {
            echo json_encode($indicators);
        } else {
            echo json_encode([
                'success' => false,
                'errorMessage' => 'no es posible obtener los indicadores.'
            ]);
        }
    }
}
