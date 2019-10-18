<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{   
    /**
     * @Route("/", name="index")
     */
    public function IndexAction()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/docs", name="docs")
     */
    public function DocsAction()
    {
        return $this->render('docs.html.twig');
    }

    /**
     * @Route("/functions", name="functions")
     */
    public function FunctionsAction()
    {
        return $this->render('functions.html.twig');
    }
}