<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{   
    /**
     * @Route("/")
     */
    public function IndexAction()
    {
        return $this->render('index.html.twig');
    }
}