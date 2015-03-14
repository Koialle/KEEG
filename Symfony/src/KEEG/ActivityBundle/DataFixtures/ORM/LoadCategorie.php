<?php

// scr/KEEG/ActivityBundle/DataFixtures/ORM/LoadCategorie.php

namespace KEEG\ActivityBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KEEG\ActivityBundle\Entity\Categorie;

class LoadCategorie implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      'Développement web',
      'Développement mobile',
      'Développement logiciel',
      'Java',
      'PHP',
      'HTML/CSS',
      'Android',
      'Jeu',
      'C',
      'C++',
      'Unity3D',
      'Graphisme',
      'Réseau'
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $category = new Categorie();
      $category->setNom($name);

      // On la persiste
      $manager->persist($category);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}