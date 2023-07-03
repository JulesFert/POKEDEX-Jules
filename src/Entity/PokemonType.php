<?php

namespace App\Entity;

use App\Repository\PokemonTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonTypeRepository::class)
 */
class PokemonType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Pokemon::class, inversedBy="pokemonTypes")
     */
    private $pokemonNumber;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="pokemonTypes")
     */
    private $typeId;

    public function getPokemonNumber(): ?Pokemon
    {
        return $this->pokemonNumber;
    }

    public function setPokemonNumber(?Pokemon $pokemonNumber): self
    {
        $this->pokemonNumber = $pokemonNumber;

        return $this;
    }

    public function getTypeId(): ?Type
    {
        return $this->typeId;
    }

    public function setTypeId(?Type $typeId): self
    {
        $this->typeId = $typeId;

        return $this;
    }

}
