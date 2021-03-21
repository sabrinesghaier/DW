<?php

namespace App\Controller;

use App\Form\MessageType;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(Request $request, \Swift_Mailer $mailer,MessageGenerator $messageGenerator)
    {
        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);
        $messages = '';
        if ($form->isSubmitted() && $form->isValid()) {
            
            $message = $form->getData();

            $date = new DateTime('NOW');
            


            // Ici nous enverrons l'e-mail dd ($message)
            $contact = (new \Swift_Message('Nouveau contact'))
    // On attribue l'expéditeur
        ->setFrom($message['email'])

    // On attribue le destinataire
        ->setTo('votre@adresse.fr')

    // On crée le texte avec la vue
         ->setBody($this->renderView('test.html.twig',compact('message')), 'text/html');
            $mailer->send($contact);
            $messages = $messageGenerator->getHappyMessage();// Permet un message flash de renvoi
            
        return $this->redirectToRoute('home');
           
        }
        return $this->render('message/index.html.twig',['Formulaire' => $form->createView()]);
    }

}