<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:"experience")]
#[ORM\Entity()]
class Experience extends ProfileItem
{
    #[ORM\Column(name:"company", type:"string", length:255, nullable:true)]
    private ?string $company;

    #[ORM\ManyToOne(targetEntity: Profile::class, inversedBy: 'experiences')]
    private Profile $profile;

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

}
