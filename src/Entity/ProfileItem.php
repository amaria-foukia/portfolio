<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class ProfileItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    protected int $id;

    #[ORM\Column(type:"string", length:255, nullable:true)]
    protected ?string $title;

    #[ORM\Column(type:"string", length:255, nullable:true)]
    protected ?string $url;

    #[ORM\Column(type:"string", length:255, nullable:true)]
    protected ?string $github;

    #[ORM\Column(name:"url_label", type:"string", length:255, nullable:true)]
    protected ?string $urlLabel;

    #[ORM\Column(name:"github_label", type:"string", length:255, nullable:true)]
    protected ?string $githubLabel;

    #[ORM\Column(type:"text", nullable:true)]
    protected ?string $description;

    #[ORM\Column(name:"city", type:"string", length:255, nullable:true)]
    protected ?string $city;

    #[ORM\Column(name:"started_at", type:"date", nullable:true)]
    protected ?\DateTime $startedAt;

    #[ORM\Column(name:"stoped_at", type:"date", nullable:true)]
    protected ?\DateTime $stopedAt;

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getUrlLabel(): ?string
    {
        return $this->urlLabel;
    }

    /**
     * @return string|null
     */
    public function getGithub(): ?string
    {
        return $this->github;
    }

    /**
     * @param string|null $github
     */
    public function setGithub(?string $github): void
    {
        $this->github = $github;
    }

    /**
     * @return string|null
     */
    public function getGithubLabel(): ?string
    {
        return $this->githubLabel;
    }

    /**
     * @param string|null $githubLabel
     */
    public function setGithubLabel(?string $githubLabel): void
    {
        $this->githubLabel = $githubLabel;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getStartedAt(): ?\DateTime
    {
        return $this->startedAt;
    }

    public function getStopedAt(): ?\DateTime
    {
        return $this->stopedAt;
    }

    /**
     * Dates formattées au format "depuis x" ou "x - y"
     * TODO dans twig
     */
    public function getFormattedDate(): string
    {
        if(!$this->getStopedAt()) {
            // pas finis : "depuis x"
            $output = 'Depuis '.strftime('%b %Y', $this->getStartedAt()->getTimestamp());
        } else {
            // finis : "x à y"
            $output =   strftime('%b %Y', $this->getStartedAt()->getTimestamp()).' - '
                . strftime('%b %Y', $this->getStopedAt()->getTimestamp());
        }

        return $output;
    }

    /**
     * durée au format : "x ans, y mois"
     * TODO dans twig
     */
    public function getFormattedDuration(): string
    {
        // La durée
        $duration = $this->getStartedAt()->diff($this->getStopedAt() ?: new \DateTime(), true);

        // formatage
        $output = '';

        foreach (['y' => 'an(s)', 'm' => 'mois'] as $intervalField => $translation) {
            if ($duration->$intervalField) {
                $output .= $duration->$intervalField.' '.$translation.' ';
            }
        }

        return $output;
    }

}
