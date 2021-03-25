<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PublicationRepository;

use DateTime;
use Symfony\Component\Validator\Constraints\Length;

class CommentaireController extends AbstractController
{    
    /**
 * @Route("/commenter/{id}", name="commenter")
 */
    public function new(Request $request, AuthenticationUtils $authenticationUtils, int $id)
    {
        $commentaire = new Commentaire();#Instanciation de la class Commentaire. $commentaire est un objet


        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le commentaire description, NotBlank {ne pas retourner vide}..)

   		if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		//dump($commentaire);//alors afficher le contenu de l'objet $article sur la console
            $date = new DateTime('NOW');
            $commentaire->setDate($date);
    
            //$commentaire->setPublication("texte");//Il convient de creer une table Type et de pointer vers son id
            $repository = $this->getDoctrine()->getRepository(Publication::class);//Il conviendra de recuperer l'id du user qui a entamé la session
           
            $pub= $repository->findOneBy(['id' => $id]);//Nous remplaçerons l'id 1 par l'id de la session
            //$id = $request->request->get('id');
            $commentaire->setPublication($pub);
            $em = $this->getDoctrine()->getManager();// je recupere le manageur des données de ma table
            $em->persist($commentaire);// Je prepare la sauvegarde / l'insertion de mon objet $commentaire dans ma base (1 ligne de table)
            $em->flush();// execution de l'SQL
            return $this->redirectToRoute('publication');
       
        }
    //$commentaires =  $this->show($user_ob);
    

    
    return $this->render('commentaire/index.html.twig', ['FormulaireCommentaire'=>$form->createView(),'publication'=>$commentaire]);
    }



    public function show($id)
    {
        // je pense à bien injecter en parametre mon service pour l'utiliser

        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Publication::class);
        $commentaires = $repository->findBy(array(),array('date' => 'DESC'));
       

    
        
        return $commentaires;
        // stocker dans $message le resultat du service : donc un message gentil
        

        // entre guillement c'est le nom utilisé sur TWIG
        // avec $ c'est utilisé sur le controller

        // premier parametre lien HTML, deuxieme tableau de données

   
    }

   




  



}