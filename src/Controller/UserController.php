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

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function new(Request $request, MessageGenerator $messageGenerator, UserPasswordEncoderInterface $encoder)
    {
       
        
       
        $user = new User();#Instanciation de la class User. $user est un objet
        
        
        $form = $this->createForm(UserType::class , $user);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)
        $message = '';
   		if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($user);//alors afficher le contenu de l'objet $user sur la console
              
              
            $encoded = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($encoded);
            //Upload de fichier
             //Ds un fichier on récupère une donnée depuis le formulaire
            $file = $form->get('photo')->getData();
        
        
        
                //Donner un nom unique -> md5 - hash / uniquid=genere un identifiant unique
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
        
                $file->move($this->getParameter('brochures_directory'), $fileName);
        
                //renvoi $fileName
                $user->setPhoto($fileName);
               

             $em = $this->getDoctrine()->getManager();// je recupere le manageur des données de ma table
             $em->persist($user);// Je prepare la sauvegarde / l'insertion de mon objet $user dans ma base (1 ligne de table)
             $em->flush();// execution de l'SQL
                   
        
       
               
        
             $message = $messageGenerator->getHappyMessage();
             //$this->addFlash('success', 'Formulaire Envoyé!');

             return $this->redirectToRoute('app_login');


  }  
    
        return $this->render('user/index.html.twig',['Formulaire' => $form->createView()]);
    
   

         

       

      return $this->render('user/index.html.twig', [
            
            'Formulaire'=>$form->createView(),
            'message'=>$message ]);    
    }

    /**
     * @Route("/assignfriend/{id}", name="friend")
     */
    public function newFriend(int $id, AuthenticationUtils $authenticationUtils){
        $email = $authenticationUtils->getLastUsername();
        $repository = $this->getDoctrine()->getRepository(User::class);//On va au repository de la table user
       
        $user_connect= $repository->findOneBy(['mail' => $email]);
        $friend =$this->getDoctrine()->getRepository(User::class)->find($id);
        $isMyFriend = $user_connect->findRelations($friend);
        if( $user_connect->findRelations($friend)== false){
            $user_connect->addRelations($friend);
            $friend->addRelations($user_connect);
            $em = $this->getDoctrine()->getManager();// je recupere le manageur des données de ma table
            $em->persist($user_connect);
            $em->persist($friend);// Je prepare la sauvegarde / l'insertion de mon objet $user dans ma base (1 ligne de table)
            $em->flush();// execution de l'SQL
                   
            return $this->redirectToRoute('publication');
        }
        else{
            return $this->redirectToRoute('publication');
        }
        

        
    }
    
 
}