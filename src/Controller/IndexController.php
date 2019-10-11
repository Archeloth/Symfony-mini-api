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
        $url = 'http://127.0.0.1:8000/hello';
        /*
        try
        {
            $json = file_get_contents($url);
            $obj = json_decode($json);
        }
        catch(Exception $e)
        {
            echo $e;
        }
        */

        
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        $obj = json_decode($query);

        return new Response(
            '<html>
                <body>
                    <p>'.$obj.'</p>
                </body>
            </html>'
        );
    }

    /**
     * @Route("/{index}")
     */
    public function SpecificElement(int $index)
    {
        return new Response(
            '<html>
                <body>
                    <p>' .$index. '</p>
                </body>
            </html>'
        );
    }
}