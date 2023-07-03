<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="integer")
     */
    private $attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $spe_attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $spe_defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $speed;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $size;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="pokemons")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=PokemonType::class, mappedBy="pokemonNumber")
     */
    private $pokemonTypes;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->pokemonTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpeAttack(): ?int
    {
        return $this->spe_attack;
    }

    public function setSpeAttack(int $spe_attack): self
    {
        $this->spe_attack = $spe_attack;

        return $this;
    }

    public function getSpeDefense(): ?int
    {
        return $this->spe_defense;
    }

    public function setSpeDefense(int $spe_defense): self
    {
        $this->spe_defense = $spe_defense;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, PokemonType>
     */
    public function getPokemonTypes(): Collection
    {
        return $this->pokemonTypes;
    }

    public function addPokemonType(PokemonType $pokemonType): self
    {
        if (!$this->pokemonTypes->contains($pokemonType)) {
            $this->pokemonTypes[] = $pokemonType;
            $pokemonType->setPokemonNumber($this);
        }

        return $this;
    }

    public function removePokemonType(PokemonType $pokemonType): self
    {
        if ($this->pokemonTypes->removeElement($pokemonType)) {
            // set the owning side to null (unless already changed)
            if ($pokemonType->getPokemonNumber() === $this) {
                $pokemonType->setPokemonNumber(null);
            }
        }

        return $this;
    }
}
