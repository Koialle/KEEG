<?php

namespace KEEG\ActivityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Projet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KEEG\ActivityBundle\Entity\ProjetRepository")
 * @UniqueEntity(fields="titre", message="Ce titre existe déjà.")
 * 
 */
class Projet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="KEEG\WebsiteBundle\Entity\Image", cascade={"persist", "remove"})
     * 
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="KEEG\ActivityBundle\Entity\Categorie", inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var  string
     *
     * @ORM\Column(name="accroche", type="string", length=255)
     */
    private $accroche;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Projet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Projet
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Projet
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set image
     *
     * @param \KEEG\WebsiteBundle\Entity\Image $image
     * @return Projet
     */
    public function setImage(\KEEG\WebsiteBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \KEEG\WebsiteBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add categories
     *
     * @param \KEEG\ActivityBundle\Entity\Categorie $categories
     * @return Projet
     */
    public function addCategory(\KEEG\ActivityBundle\Entity\Categorie $categorie)
    {
        $this->categories[] = $categorie;

        $categorie->addProjet($this);

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \KEEG\ActivityBundle\Entity\Categorie $categories
     */
    public function removeCategory(\KEEG\ActivityBundle\Entity\Categorie $categorie)
    {
        $this->categories->removeElement($categorie);

        $categorie->removeProjet($this);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set accroche
     *
     * @param string $accroche
     * @return Projet
     */
    public function setAccroche($accroche)
    {
        $this->accroche = $accroche;

        return $this;
    }

    /**
     * Get accroche
     *
     * @return string 
     */
    public function getAccroche()
    {
        return $this->accroche;
    }
}
