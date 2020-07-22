<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext = {"groups"={"user:read"}, "enable_max_depth"="true"},
 *     denormalizationContext = {"groups"={"user:write"}, "enable_max_depth"="true"},
 *     collectionOperations={
 *         "get"={},
 *         "post"={},
 *     },
 *     itemOperations={
 *         "get"={},
 *         "put"={},
 *         "delete"={},
 *     }
 * ),
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Groups({"user:read", "user:write"})
     * @Assert\Length(min = 2 ,max = 50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Groups({"user:read", "user:write"})
     * @Assert\Length(min = 2 ,max = 50)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     * @Groups({"user:read", "user:write"})
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     * @Groups({"user:read", "user:write"})
     */
    private $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return $this
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $creadted
     */
    public function setCreated(?\DateTimeInterface $creadted): void
    {
        $this->created = $creadted;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    /**
     * @param \DateTimeInterface|null $updated
     * @return $this
     */
    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;
        return $this;
    }
}