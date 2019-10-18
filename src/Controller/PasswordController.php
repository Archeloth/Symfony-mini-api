<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PasswordController
{
    /**
     * @Route("/password", name="password")
     */
    public static function PasswordAction()
    {
        $generated_password = bin2hex(random_bytes(12));

        return new Response($generated_password);
    }

    /**
     * @Route("/password/{length}")
     */
    public static function CustomLengthPasswordAction(int $length = 12)
    {
        $generated_password = bin2hex(random_bytes($length));

        return new Response($generated_password);
    }

    /**
     * @Route("/password/{length}/{iteration}")
     */
    public static function CustomIteratedPasswordAction(int $length = 12, int $iteration = 1)
    {
        if($iteration > 0)
        {
            $generated_seed = bin2hex(random_bytes($length));

            for($i = 0; $i < $iteration; $i++)
            {
                $generated_seed = md5($generated_seed);
            }
            return new Response(substr($generated_seed ,0 , $length));
        }
        else
        {
            return new Response("Error");
        }
    }
}
