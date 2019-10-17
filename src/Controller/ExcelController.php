<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ExcelController extends AbstractController
{
    /**
     * @Route("/excel", name="excel")
     */
    public function ExcelAction()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('test.xlsx')->getActiveSheet()->toArray();
        return $this->render('excel.html.twig', ['data' => $spreadsheet]);
    }
}
