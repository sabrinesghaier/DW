<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\MessageGenerator;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function new(Request $request, MessageGenerator $messageGenerator)
    {
       
        
       
        $user = new User();#Instanciation de la class User. $user est un objet
        
        $form = $this->createForm(UserType::class , $user);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)
        $message = '';
   		if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($user);//alors afficher le contenu de l'objet $user sur la console
            
            
            $repository = $this->getDoctrine()->getRepository(User::class);
            
           $user_obj= $repository->findOneBy(['email' => $form['mail']]);
           if( $user_obj && $user_obj->getPassword()== $form['password'])
               {
               
                }
                

   
            
         
        }
       

      return $this->render('home.html.twig', [
            
            'Formulaire'=>$form->createView(),
            'message'=>$message ]);    
    }

    


}