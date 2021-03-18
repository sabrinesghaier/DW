<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DwController extends AbstractController
{
/**
* @Route("/",name="home" )
*/
public function home()
    {        
        return $this->render('user/index.html.twig');#je veux la route /home
    }
}