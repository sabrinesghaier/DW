<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\User;
use App\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use DateTime;

class PublicationController extends AbstractController
{    
    /**
     * @Route("/publication", name="publication" )
     */
    public function new(Request $request)
    {
        $publication = new Publication();#Instanciation de la class Champs. $champs est un objet


        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		dump($publication);//alors afficher le contenu de l'objet $article sur la console
            $date = new DateTime('NOW');
            $publication->setDate($date);
    
            $publication->setType("texte");//Il convient de creer une table Type et de pointer vers son id
            $repository = $this->getDoctrine()->getRepository(User::class);//Il conviendra de recuperer l'id du user qui a entamé la session
           
            $user_obj= $repository->findOneBy(['id' => 1]);//Nous remplaçerons l'id 1 par l'id de la session
            $publication->setUser($user_obj);
             $em = $this->getDoctrine()->getManager();
             $em->persist($publication);
             $em->flush();
       
        }
    $publications =  $this->show();

    return $this->render('publication/index.html.twig', ['FormulairePublication'=>$form->createView(),'publication'=>$publications]);
    }



    public function show()
    {
        // je pense à bien injecter en parametre mon service pour l'utiliser

        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Publication::class);
        $publications = $repository->findBy(array(),array('date' => 'DESC'));

        
        return $publications;
        // stocker dans $message le resultat du service : donc un message gentil
        

        // entre guillement c'est le nom utilisé sur TWIG
        // avec $ c'est utilisé sur le controller

        // premier parametre lien HTML, deuxieme tableau de données

   
    }




  

}