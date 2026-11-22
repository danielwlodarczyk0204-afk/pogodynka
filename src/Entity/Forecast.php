<?php

namespace App\Entity;

use App\Repository\ForecastRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

// ==================================================

#[ORM\Entity(repositoryClass: ForecastRepository::class)]
class Forecast {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'forecasts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?place $place = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $temperature = null;

    #[ORM\Column]
    private ?int $cloudiness = null;

    #[ORM\Column]
    private ?int $humidity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $rain = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getPlace(): ?place {
        return $this->place;
    }

    public function setPlace(?place $place): static {
        $this->place = $place;
        return $this;
    }

    public function getDate(): ?\DateTime {
        return $this->date;
    }

    public function setDate(\DateTime $date): static {
        $this->date = $date;
        return $this;
    }

    public function getTemperature(): ?string {
        return $this->temperature;
    }

    public function setTemperature(string $temperature): static {
        $this->temperature = $temperature;
        return $this;
    }

    public function getCloudiness(): ?string {
        return $this->cloudiness;
    }

    public function setCloudiness(string $cloudiness): static {
        $this->cloudiness = $cloudiness;
        return $this;
    }

    public function getHumidity(): ?int {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): static {
        $this->humidity = $humidity;
        return $this;
    }

    public function getRain(): ?string {
        return $this->rain;
    }

    public function setRain(string $rain): static {
        $this->rain = $rain;
        return $this;
    }
}
