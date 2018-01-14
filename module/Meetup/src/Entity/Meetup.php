<?php

declare(strict_types=1);

namespace Meetup\Entity;

use Ramsey\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Meetup
 * @package Application\Entity
 * @ORM\Entity(repositoryClass="\Meetup\Repository\MeetupRepository")
 * @ORM\Table(name="meetup")
 */

class Meetup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     **/
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2000, nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
     private $dateBegin;

     /**
      * @ORM\Column(type="string", nullable=false)
      */
      private $dateEnd;

    public function __construct(string $title, string $description, string $dateStart, string $dateEnd)
    {
        $this->id = Uuid::uuid4()->toString();
        $this->title = $title;
        $this->description = $description;
        $this->dateBegin = $dateBegin;
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return string
     */
    public function getId() : String
    { 
        return $this->id;
    }
    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }


    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDateBegin() : string
    {
        return $this->dateBegin;
    }


    public function setDateBegin(string $dateBegin) : String
    {
        return $this->dateBegin = $dateBegin;
    }

    /**
     * @return string
     */
    public function getDateEnd() : string
    {
        return $this->dateEnd;
    }

    public function setDateEnd(string $getDateEnd) : String
    {
        return $this->getDateEnd = $getDateEnd;
    }
}
