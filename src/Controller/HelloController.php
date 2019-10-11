<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HelloController 
{
    /**
     * @Route("/hello")
     */
    public function HelloAction()
    {
        $random_numbers = array();
        for($i = 0; $i < 10; $i++)
        {
            $random_numbers[$i] = random_int(0,10);
        }
        $response = new JsonResponse(array('Array of random numbers' => $random_numbers));

        return $response;
    }
}