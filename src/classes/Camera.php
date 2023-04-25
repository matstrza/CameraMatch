<?php

class Camera extends CameraManager {
    private ?int $id = null;
    private ?string $company = null;
    private ?string $model = null;
    private ?string $lensMount = null;
    private ?string $sensor = null;
    private ?string $cameraType = null;
    private ?string $imagePath = null;
    private ?string $linkOne = null;
    private ?string $linkTwo = null;
    
    public function __construct(?int $id, ?string $company, ?string $model, ?string $lensMount, ?string $sensor, ?string $cameraType, ?string $imagePath, ?string $linkOne, ?string $linkTwo) {
        $this->id = $id;
        $this->company = $company;
        $this->model = $model;
        $this->lensMount = $lensMount;
        $this->sensor = $sensor;
        $this->cameraType = $cameraType;
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

    public function getLensMount(): ?string {return $this->lensMount;}
    public function setLensMount(string $lensMount): void {$this->lensMount = $lensMount;}

    public function getSensor(): ?string {return $this->sensor;}
    public function setSensor(string $sensor): void {$this->sensor = $sensor;}

    public function getCameraType(): ?string {return $this->cameraType;}
    public function setCameraType(string $cameraType): void {$this->cameraType = $cameraType;}

    public function getImagePath(): ?string {return $this->imagePath;}
    public function setImagePath(string $imagePath): void {$this->imagePath = $imagePath;}

    public function getLinkOne(): ?string {return $this->linkOne;}
    public function setLinkOne(string $LinkOne): void {$this->linkOne = $LinkOne;}

    public function getLinkTwo(): ?string {return $this->linkTwo;}
    public function setLinkTwo(string $LinkTwo): void {$this->linkTwo = $LinkTwo;}
}