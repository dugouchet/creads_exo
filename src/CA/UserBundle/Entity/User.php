<?php

namespace CA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use CA\ForumBundle\Entity\Article;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="CA\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Many Users have Many LikedArticles.
     * @ORM\ManyToMany(targetEntity="CA\ForumBundle\Entity\Article", inversedBy="users")
     * @ORM\JoinTable(name="users_articles")
     */
    protected $likedArticles;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getLikedArticles() {
    	return $this->likedArticles;
    }
    public function setLikedArticles($likedArticles) {
    	$this->likedArticles = $likedArticles;
    	return $this;
    }
    public function addArticle(Article $article)
    {
    	// Ici, on utilise l'ArrayCollection vraiment comme un tableau
    	$this->likedArticles[] = $article;
    }
}
