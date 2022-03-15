<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:"skill")]
#[ORM\Entity()]
class Skill extends ProfileItem
{

    #[ORM\ManyToOne(targetEntity: Profile::class, inversedBy: 'skills')]
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
}
