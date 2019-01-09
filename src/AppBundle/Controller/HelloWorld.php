<?php
/**
 * Created by PhpStorm.
 * User: thremond
 * Date: 09/01/19
 * Time: 08:07
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorld extends Controller
{

    /**
     * Matches /helloworld exactly
     *
     * @Route("/helloworld/{name}/", name="app_helloworld_name")
     */
    public function getHello($name){

        return $this->render(
            'base.html.twig',
            [
                'hello' => 'Hello',
                'name' => $name
            ]
        );
    }
}