<?php

// src/KEEG/WebsiteBundle/Entity/Contact.php

namespace KEEG\WebsiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Contact
{
  
  private $title;
  private $content;
  private $name;
  private $mail;

  
  public function __construct(){
	
  }
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  
  public function getTitle()
  {
    return $this->title;
  }

  
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  
  public function getName()
  {
    return $this->name;
  }
  
  
  public function setContent($content)
  {
    $this->content = $content;
    return $this;
  }

  
  public function getContent()
  {
    return $this->content;
  }

    
  public function setMail($mail)
  {
    $this->mail = $mail;
    return $this;
  }


  public function getMail()
  {
    return $this->mail;
  }

   
}