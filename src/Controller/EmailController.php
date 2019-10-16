<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EmailController
{
    /**
     * @Route("/email")
     */
    public function EmailAction(\Swift_Mailer $mailer)
    {
        //Doesn't work on local host
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('test@test.com')
            ->setTo('sent@to.com')
            ->setBody('this could be a twig file')
        ;

        $result = $mailer->send($message);
        $result = ($result == 1) ? "true" : "false";
        
        return new Response('Sikeres? '.$result);
    }
}
