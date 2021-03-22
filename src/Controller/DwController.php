<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DwController extends AbstractController
{


public function home()
    {   
        $isConnected = false ;     
        return $this->render('home.html.twig');#je veux la route /home
    }
}