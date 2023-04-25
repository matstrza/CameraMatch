<?php

class Lens extends LensManager {
    private ?int $id = null;
    private ?string $company = null;
    private ?string $model = null;
    private ?string $cameraMount = null;
    private ?string $sensor = null;
    private ?string $lensType = null;
    private ?string $focalLength = null;
    private ?string $maxAperture = null;
    private ?string $imagePath = null;
    private ?string $linkOne = null;
    private ?string $linkTwo = null;

    public function __construct(?int $id, ?string $company, ?string $model, ?string $cameraMount, ?string $sensor, ?string $lensType, ?string $focalLength, ?string $maxAperture, ?string $imagePath, ?string $linkOne, ?string $linkTwo) {
        $this->id = $id;
        $this->company = $company;
        $this->model = $model;
        $this->cameraMount = $cameraMount;
        $this->sensor = $sensor;
        $this->lensType = $lensType;
        $this->focalLength = $focalLength;
        $this->maxAperture = $maxAperture;
        $this->imagePath = $imagePath;
        $this->linkOne = $linkOne;
        $this->linkTwo = $linkTwo;
    }

    public function getId(): ?int {return $this->id;}
    public function setId(int $id): void {$this->id = $id;}

    public function getCompany(): ?string {return $this->company;}
    public function setCompany(string $company): void {$this->company = $company;}

    public function getModel(): ?string {return $this->model;}
    public function setModel(string $model): void {$this->model = $model;}

    public function getCameraMount(): ?string {return $this->cameraMount;}
    public function setCameraMount(string $cameraMount): void {$this->cameraMount = $cameraMount;}

    public function getSensor(): ?string {return $this->sensor;}
    public function setSensor(string $sensor): void {$this->sensor = $sensor;}

    public function getLensType(): ?string {return $this->lensType;}
    public function setLensType(string $lensType): void {$this->lensType = $lensType;}

    public function getFocalLength(): ?string {return $this->focalLength;}
    public function setFocalLength(string $focalLength): void {$this->focalLength = $focalLength;}

    public function getMaxAperture(): ?string {return $this->maxAperture;}
    public function setMaxAperture(string $maxAperture): void {$this->maxAperture = $maxAperture;}

    public function getImagePath(): ?string {return $this->imagePath;}
    public function setImagePath(string $imagePath): void {$this->imagePath = $imagePath;}

    public function getLinkOne(): ?string {return $this->linkOne;}
    public function setLinkOne(string $LinkOne): void {$this->linkOne = $LinkOne;}

    public function getLinkTwo(): ?string {return $this->linkTwo;}
    public function setLinkTwo(string $LinkTwo): void {$this->linkTwo = $LinkTwo;}
}