<?php

namespace CA\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="CA\ForumBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first title must be at least 2 characters",
     *      maxMessage = "Your first name cannot be longer than 50 characters"
     * )
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     */
    protected  $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreLike", type="integer", nullable=true)
     */
    protected  $nombreLike;
    
    /**
     * Many Articles have Many Users.
     * @ORM\ManyToMany(targetEntity="CA\UserBundle\Entity\User", mappedBy="likedArticles")
     */
    protected $users;


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
     * @return Article
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
     * Set nombreLike
     *
     * @param integer $nombreLike
     * @return Article
     */
    public function setNombreLike($nombreLike)
    {
        $this->nombreLike = $nombreLike;

        return $this;
    }

    /**
     * Get nombreLike
     *
     * @return integer 
     */
    public function getNombreLike()
    {
        return $this->nombreLike;
    }
    
    public function getUsers() {
    	return $this->users;
    }
    public function setUsers($users) {
    	$this->users = $users;
    	return $this;
    }
}
