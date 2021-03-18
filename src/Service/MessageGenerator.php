<?php

namespace App\Service;

class MessageGenerator
{
    public function getHappyMessage(): string
    {
    	// ceci est une fonction qui genere automatiquement des messages
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
            'Mon quatrieme message',
        ];

        $index = array_rand($messages);
        // rand = random = au hasard ...choisir au hasard un message et le stocker dans index

        return $messages[$index]; // renvoyer le message choisi au hasard par exemple "Mon quatrieme message"
    }

    // Pour utiliser ce service : 1 - dans mon controleur " use lien vers le service"
    // 2 - injecter dans les parametres de la fonction (Injection de dépendances ... Design Patterns <= à regarder pour les plus curieuses)
    // 3 - utiliser ma fonction, et stocker le retour de la fonction dans une variable
}