<?php
/**
 * Created by PhpStorm.
 * User: thremond
 * Date: 09/01/19
 * Time: 08:28
 */

namespace AppBundle\Entity;

/**
 * Class Annonce
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Annonce")
 */
class Annonce
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $title;
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $content;
    /**
     * @var int
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $price;
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $postalcode;
    /**
     * @var \DateTime
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $dateCreated;
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $picture;

}