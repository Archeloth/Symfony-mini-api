<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RandomController 
{
    /**
     * @Route("/random", name="random")
     */
    public function RandomAction()
    {
        $random_numbers = array();
        for($i = 0; $i < 10; $i++)
        {
            $random_numbers[$i] = random_int(0,10);
        }
        $response = new JsonResponse(array('Array of random numbers' => $random_numbers));

        return $response;
    }

    /**
     * @Route("/random/{size}")
     */
    public function CusmonSizeRandomAction(int $size)
    {
        $random_numbers = array();
        for ($i = 0; $i < $size; $i++) {
            $random_numbers[$i] = random_int(0, 10);
        }
        $response = new JsonResponse(array('Array of random numbers' => $random_numbers));

        return $response;
    }
}