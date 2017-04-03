## Projet Tutoré CISIIE

**PHPv2** est le résultat d'une année de travail de 4 étudiants en Licence Professionnelle CISIIE. Nous avons participé à la phase de conception ainsi qu'à la phase de réalisation. L'intitulé de notre sujet est : *"Environnement d'apprentissage et d'auto évaluation de la programmation"*
Nous avons été encadré par Monsieur Amine Boumaza.
Vous pourrez retrouver notre site de suivi sur [Webetu](https://webetu.iutnc.univ-lorraine.fr/www/torzuoli2u/wordpress/index.php/about/).

## Installation

Cloner le dépot :
> $ git clone https://github.com/victorreeb/projet_tutore.git

Créer une base de données (ex : *phpv2*)
Copier et configurer le **.env**
> $ cp .env.example .env
> Remplacer les champs avec vos informations

Composer install : 
> $ composer install

Créer une clé application :
> $ php artisan key:generate

Vider le cache de l'application :
> $ php artisan config:cache

Lancer la migration de la base de données :
> $ php artisan migrate

Créer l'alias du dossier storage :
> $ php artisan storage:link

Créer les dossiers de stockage des avatars :
> mkdir public/storage/uploads
> mkdir public/storage/uploads/avatars

choix 1 : Lancer votre application **Laravel** depuis un serveur apache :
> Ouvrir un navigateur sur ```localhost```
>
choix 2 : Lancer un serveur homestead **Laravel** :
> $ php artisan serve <br>
> Ouvrir un navigateur sur ```localhost:8000```

## Contributeurs
* [**Pierre Becker**](https://github.com/PiBecker)
* [**Vivien Larrière**](https://github.com/vivienLarriere)
* [**Victor Reeb**](https://github.com/victorreeb)
* [**Hugo Torzuoli**](https://github.com/torzuoliH)

## Licence

PHPv2 is open-sourced software licensed under the MIT license.
