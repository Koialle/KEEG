<?php

namespace KEEG\ArticleBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Temoignage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KEEG\ArticleBundle\Entity\TemoignageRepository")
 * @UniqueEntity(fields="titre", message="Ce titre existe déjà.")
 * 
 */
class Temoignage
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
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     * @Assert\Length(min=10)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="intervenant", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $intervenant;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     * @Assert\NotBlank()
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="accroche", type="string", length=255)
     * @Assert\Length(min=20, max=120)
     */
    private $accroche;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

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
     * Set date
     *
     * @param \DateTime $date
     * @return Temoignage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Temoignage
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
     * Set intervenant
     *
     * @param string $intervenant
     * @return Temoignage
     */
    public function setIntervenant($intervenant)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return string 
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Temoignage
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set accroche
     *
     * @param string $accroche
     * @return Temoignage
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

    /**
     * Set image
     *
     * @param \KEEG\WebsiteBundle\Entity\Image $image
     * @return Temoignage
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
}
