<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:"realisation")]
#[ORM\Entity()]
class Realisation extends ProfileItem
{
    #[ORM\ManyToOne(targetEntity: Profile::class, inversedBy: 'realisations')]
    private $profile;

    #[ORM\Column(type:"string", length:255, nullable:true)]
    private $technology;

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * @param mixed $technology
     */
    public function setTechnology($technology): void
    {
        $this->technology = $technology;
    }

}
