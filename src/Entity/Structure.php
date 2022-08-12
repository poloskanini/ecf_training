<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructureRepository::class)]
class Structure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\OneToOne(inversedBy: 'structure', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn]
    private User $user_id;

    #[ORM\ManyToOne(inversedBy: 'structures')]
    #[ORM\JoinColumn]
    private Partner $partner_id;

    #[ORM\Column(length: 255)]
    private string $postalAdress;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPartnerId(): Partner
    {
        return $this->partner_id;
    }

    public function setPartnerId(Partner $partner_id): self
    {
        $this->partner_id = $partner_id;

        return $this;
    }

    public function getPostalAdress(): string
    {
        return $this->postalAdress;
    }

    public function setPostalAdress(string $postalAdress): self
    {
        $this->postalAdress = $postalAdress;

        return $this;
    }
    
}
