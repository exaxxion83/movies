<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\EntityListener\MovieListener;

/**
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"access_control"="is_granted('ROLE_USER')"},
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get"={"access_control"="is_granted('ROLE_USER')"},
 *         "put"={"access_control"="is_granted('ROLE_ADMIN')"},
 *         "delete"={"access_control"="is_granted('ROLE_ADMIN')"},
 *         "patch"={"access_control"="is_granted('ROLE_ADMIN')"}
 *     }
 * )
 */
class Movie
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="movies")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=PeopleRoleInMovie::class, mappedBy="movie")
     */
    private $peopleRoleInMovie;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $urlImg;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->peopleRoleInMovie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

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
     * @return Collection<int, PeopleRoleInMovie>
     */
    public function getPeopleRoleInMovie(): Collection
    {
        return $this->peopleRoleInMovie;
    }

    public function addPeopleRoleInMovie(PeopleRoleInMovie $peopleRoleInMovie): self
    {
        if (!$this->peopleRoleInMovie->contains($peopleRoleInMovie)) {
            $this->peopleRoleInMovie[] = $peopleRoleInMovie;
        }

        return $this;
    }

    public function removePeopleRoleInMovie(PeopleRoleInMovie $peopleRoleInMovie): self
    {
        $this->peopleRoleInMovie->removeElement($peopleRoleInMovie);

        return $this;
    }

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): self
    {
        $this->urlImg = $urlImg;

        return $this;
    }
}
