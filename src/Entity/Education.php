<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:"education")]
#[ORM\Entity()]
class Education extends ProfileItem
{
    #[ORM\Column(name:"school", type:"string", length:255, nullable:true)]
    private string $school;

    #[ORM\ManyToOne(targetEntity: Profile::class, inversedBy: 'educations')]
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

    public function getSchool(): string
    {
        return $this->school;
    }

    public function setSchool(string $school): void
    {
        $this->school = $school;
    }

}
