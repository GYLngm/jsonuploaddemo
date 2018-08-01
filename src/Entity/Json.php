<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JsonRepository")
 */
class Json
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $time;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $IMEI;

    /**
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     * @ORM\Column(type="integer")
     */
    private $temperature;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_bus;

    public function getId()
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getIMEI(): ?int
    {
        return $this->IMEI;
    }

    public function setIMEI(int $IMEI): self
    {
        $this->IMEI = $IMEI;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    public function setTemperature(int $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getNumBus(): ?int
    {
        return $this->num_bus;
    }

    public function setNumBus(int $num_bus): self
    {
        $this->num_bus = $num_bus;

        return $this;
    }
}
