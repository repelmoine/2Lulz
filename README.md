2Lulz Projet Symfony Licence Web
Pelmoine Rémi & Gil Clément
========================

Le but de ce projet était de recréer un 9Gag en symfony

=======================================================

Ce qui a été fait:

    - création de posts
    - possibilités de commenter les posts
    - voter un post
    - seul les utilisateurs inscrit peuvent poster,commenter,voter
    - mise en place d'une api rest.
    - 2 tests
    - propriétés à serializer
    - création de 2 services:
        ° ImageUploader (pourquoi ? => déplacer image dans un répertoire spécifique)
        ° ApiUtils (pourquoi ? => factoriser le code)
    
Ce qui n'a pas été fait

    - empécher un utilisateur de voter plusieurs fois
    - beaucoup plus de test
    - mise en place d'un docker
    - toutes les méthodes de l'API n'ont pas été implémentées
    - meilleur paramétrage des propriétés à serializer
    
    
Surplus:

    Nous avons décidé d'utiliser FOSRestBundle ainsi que JMS Serializer.
    L'application ne nécessité pas l'utilisation de ces Bundle mais pour approfondir nos connaissances dans le but
    de les réutilisés dans l'avenir, nous avons choisi de les implémenter.
    Bien sur, nous n'ulisons qu'une minuscule partie de leurs fonctionnalités mais la lecture de leur documentation nous
    a permis de comprendre un peu mieux leur intérêt.
    
    
===========================================================


    Lancement du projet:
    
    - php bin/console server:run
    
    Creation base de données:
    
    - php bin/console doctrine:database:create
    
    
    
    
    Procédure: 
    
        - se connecter ou s'enregistrer
        - poster/commenter/voter
        
===============================================================


    La plupart des points attendus sont présents.
    
    Nous n'avons pas implémenté toutes les méthodes de l'API cependant la méthode delete est développée et fonctionne.