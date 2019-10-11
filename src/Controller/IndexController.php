<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{   
    /**
     * @Route("/")
     */
    public static function IndexAction()
    {
        return new Response('
        <html>
            <body>
                <p>Hi! Use one of my functions to get dynamic, read-only data!</p>
                <a href="/random">Array of random numbers.</a> You can add an extra number at the end for how many do you need. The default value is 10.
            </body>
        </html>');
    }
}