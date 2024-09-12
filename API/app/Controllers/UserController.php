<?php
require_once 'Models/User.php';

class UserController
{
    public function login($params)
    {
        $username = $params['username'];
        $password = $params['password'];

        $userModel = new User();
        $user = $userModel->login($username, $password);

        header('Content-Type: application/json');

        if (!empty($user)) {
            echo json_encode([
                'success' => true,
                'user' => $user
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'errorMessage' => 'El usuario o contraseña no son válidos'
            ]);
        }
    }
}
