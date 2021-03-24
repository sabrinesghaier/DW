<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\MessageGenerator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function new( AuthenticationUtils $authenticationUtils, Request $request, MessageGenerator $messageGenerator, UserPasswordEncoderInterface $encoder)
    {
       
        $email = $authenticationUtils->getLastUsername();
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user= $repository->findOneBy(['mail' => $email]);
       
       // $user = new User();#Instanciation de la class User. $user est un objet
        
        
        $form = $this->createForm(UserType::class , $user);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)
        $message = '';
   		if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($user);//alors afficher le contenu de l'objet $user sur la console
              
              
            $encoded = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($encoded);

             $em = $this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();
             $message = $messageGenerator->getHappyMessage();
             //$this->addFlash('success', 'Formulaire Envoyé!');

            // return $this->redirectToRoute('/login');

         
        }
       

      return $this->render('profil/index.html.twig', [
            
            'Formulaire'=>$form->createView(),
            'message'=>$message ]);    
    }

}