<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity
 * @ORM\Table(name="genus")
 */
class Genus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $subFamily;

    /**
     * @ORM\Column(type="integer")
     */
    private $speciesCount;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $funFact;

    /**
     * @return string
     */
    public function getSubFamily(): string
    {
        return $this->subFamily;
    }

    /**
     * @param string $subFamily
     */
    public function setSubFamily(string $subFamily): void
    {
        $this->subFamily = $subFamily;
    }

    /**
     * @return int
     */
    public function getSpeciesCount(): int
    {
        return $this->speciesCount;
    }

    /**
     * @param int $speciesCount
     */
    public function setSpeciesCount(int $speciesCount): void
    {
        $this->speciesCount = $speciesCount;
    }

    /**
     * @return string|null
     */
    public function getFunFact(): ?string
    {
        return $this->funFact;
    }

    /**
     * @param string $funFact
     */
    public function setFunFact(string $funFact): void
    {
        $this->funFact = $funFact;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getUpdatedAt(): DateTime
    {
        return new DateTime('-' . rand(0, 100) . ' days');
    }
}