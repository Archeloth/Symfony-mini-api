<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\MyFormType;

class StringSortController extends AbstractController
{
    /**
     * @Route("/string", name="string")
     */
    public function StringSortAction(Request $request)
    {
        //Post-os küldés?
        $return_str = "";

        $form = $this->createForm(MyFormType::class);
        $form->handleRequest($request);

        $test_sentence = $form->get('input')->getData();
        
        $test_sentence = mb_strtolower($test_sentence, 'UTF-8');
        $test_sentence = explode(' ',$test_sentence);
        foreach($test_sentence as $test_word)
        {
            $test_word = WordSort::WordSort($test_word);
            $return_str .= ($test_word . " ");
        }
        return $this->render('string.html.twig', ['output' => $return_str, 'form' => $form->createView()]);
    }
}

class WordSort
{
    public static function WordSort(string $word)
    {
        mb_internal_encoding('UTF-8');
        $str_array = str_split($word);;
        sort($str_array);
        $str = implode('', $str_array);
        
        return $str;
    }
}