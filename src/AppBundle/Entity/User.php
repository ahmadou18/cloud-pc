<?php
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    // JOINTURE BLOGPOST USER

    /**
     * @ORM\OneToMany(targetEntity="BlogPost", mappedBy="fos_user")
     */
    private $blogPosts;


    public function getBlogPosts()
    {
        return $this->blogPosts;
    }

    public function __construct()
    {
        parent::__construct();
        $this->blogPosts = new ArrayCollection();
    }
}