<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
#[ORM\Table(name:'profile')]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $jobTitle;

    #[ORM\Column(type: 'boolean')]
    private bool $isBusy;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $picture;

    #[ORM\Column(type: 'string', length: 255)]
    private string $city;

    #[ORM\Column(type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $about;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $telephone;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Education::class)]
    private Collection $educations;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Experience::class)]
    private Collection $experiences;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Realisation::class)]
    private Collection $realisations;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Skill::class)]
    private Collection $skills;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: SoftSkill::class)]
    private Collection $softskills;

    public function __construct()
    {
        $this->educations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->realisations = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->softskills = new ArrayCollection();
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

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getIsBusy(): ?bool
    {
        return $this->isBusy;
    }

    public function setIsBusy(bool $isBusy): self
    {
        $this->isBusy = $isBusy;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEducations(): array
    {
        return $this->educations->toArray();
    }

    public function addEducation(Education $education): self
    {
        if (!$this->educations->contains($education)) {
            $this->educations[] = $education;
            $education->setProfile($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->educations->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getProfile() === $this) {
                $education->setProfile(null);
            }
        }

        return $this;
    }

    public function getExperiences(): array
    {
        return $this->experiences->toArray();
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setProfile($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->removeElement($experience)) {
            // set the owning side to null (unless already changed)
            if ($experience->getProfile() === $this) {
                $experience->setProfile(null);
            }
        }

        return $this;
    }

    public function getRealisations(): array
    {
        return $this->realisations->toArray();
    }

    public function addRealisation(Realisation $realisation): self
    {
        if (!$this->realisations->contains($realisation)) {
            $this->realisations[] = $realisation;
            $realisation->setProfile($this);
        }

        return $this;
    }

    public function removeRealisation(Realisation $realisation): self
    {
        if ($this->realisations->removeElement($realisation)) {
            // set the owning side to null (unless already changed)
            if ($realisation->getProfile() === $this) {
                $realisation->setProfile(null);
            }
        }

        return $this;
    }

    public function getSkills(): array
    {
        return $this->skills->toArray();
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setProfile($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getProfile() === $this) {
                $skill->setProfile(null);
            }
        }

        return $this;
    }

    public function getSoftskills(): array
    {
        return $this->softskills->toArray();
    }

    public function addSoftskill(SoftSkill $softskill): self
    {
        if (!$this->softskills->contains($softskill)) {
            $this->softskills[] = $softskill;
            $softskill->setProfile($this);
        }

        return $this;
    }

    public function removeSoftskill(SoftSkill $softskill): self
    {
        if ($this->softskills->removeElement($softskill)) {
            // set the owning side to null (unless already changed)
            if ($softskill->getProfile() === $this) {
                $softskill->setProfile(null);
            }
        }

        return $this;
    }
}
