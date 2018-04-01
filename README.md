Le site du un
========================

lesisteduun.fr est un forum communautaire opensource axé sur l'entraide entre développeurs. Il vous permettra de partager vos connaissances et d'en apprendre toujours plus sur le développement de sites web et de logiciels.

Ce site a été réalisé avec le framework [Symfony 3.4](https://github.com/symfony/symfony/tree/3.4)


Bundles utilisés en plus du core Symfony
----------------------------------------

[FosUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle)
pour gérer les utilisateurs (enregistrement, connexion, session) ainsi que leurs rôles

[IvoryCKEditorBundle](https://github.com/egeloen/IvoryCKEditorBundle)
pour utiliser une interface WYSIWYG lors du post de messages

[SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle)
Pour la gestion administrative du back office

Etapes d'installation
--------------

Si vous voulez réutiliser le code source de lesiteduun.fr pour réaliser votre propre forum, suivez les étapes suivantes:

1. Procurez-vous la dernière version du code
    - dans une console avec la commande ```git clone https://github.com/Shenggy/LeSiteDuUn ```
    - en téléchargeant le zip du code

2. Pour installer les bundles utilisés lors du développement, utilisez dans une console et à la racine du projet la commande ```composer update```
    - répondez ensuite au questionnaire de Symfony pour configurer votre projet
        - si vous voulez utiliser notre base de données, répondez ```LeSiteDuUn``` à database_name

3. Pour utiliser notre base de données
    - démarrez votre serveur de base de données 
    - utilisez dans une console et à la racine du projet la commande ```php bin/console doctrine:database:create``` 
    - puis ```php bin/console doctrine:schema:update```
    - chargez les données de la base avec phpmyadmin
    
Pour utiliser le compte administrateur associé à la base de données, connectez vous avec le pseudo **admin** et le mot de passe **admin**

Si vous voulez créer un autre compte administrateur, suivez les étapes suivantes

1. A la racine du projet, dans une console, utilisez la commande ```php bin/console fos:user:create``` et remplissez les champs comme vous le souhaitez
2. Une fois le compte créé, utilisez la commande ```php bin/console fos:user:promote```
    - renseignez le pseudo de l'utilisateur précédemment créé
    - renseignez **ROLE_SUPER_ADMIN** pour le promouvoir super administrateur et avoir accès au back office du site
    