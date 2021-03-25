<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DwController extends AbstractController
{
 /**
 * @Route("mention",name="mention" )
 */
public function mention()
{        
    return $this->render('mention.html.twig');#je veux la route /mention
}

}