<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */

class Article

{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $arcticle_id;


    /** 
     * @ORM\Column(type="string") 
     */
    protected $arcticle_title;



    /** 
     * @ORM\Column(type="text") 
     */
    protected $arcticle_content;


    function getName()
    {
        return $this->arcticle_title;
    }

    function getId()
    {
        return $this->arcticle_id;
    }

    function getContent()
    {
        return $this->arcticle_content;
    }
}
