<?php

class LensManager extends Db {
    private $lenses;//array

    public function addLens($lens) {
        $this->lenses[] = $lens;
    }

    public function getLenses() {
        return $this->lenses;
    }

    public function loadLenses() {
        $query = $this->getDb()->prepare("
        SELECT l.id, l.company, l.model, cm.camera_mount, l.sensor, l.lensType, l.focalLength, l.maxAperture, l.imagePath, l.linkOne, l.linkTwo
        FROM lenses l
        INNER JOIN camera_mounts cm ON l.cameraMount_id = cm.id
        ORDER BY l.company, l.model
        ");
        $query->execute();
        $myLenses = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myLenses as $lens) {
            $l = new Lens($lens['id'],$lens['company'],$lens['model'],$lens['camera_mount'],$lens['sensor'],$lens['lensType'],$lens['focalLength'],$lens['maxAperture'],$lens['imagePath'],$lens['linkOne'],$lens['linkTwo']);
            $this->addLens($l);
        }
    }
    
    public function lensById($id) {
        $query = $this->getDb()->prepare("
        SELECT l.id, l.company, l.model, l.cameraMount_id, cm.camera_mount, l.sensor, l.lensType, l.focalLength, l.maxAperture, l.imagePath, l.linkOne, l.linkTwo
        FROM lenses l
        INNER JOIN camera_mounts cm ON l.cameraMount_id = cm.id
        WHERE l.id = ?
        ");
        $query->execute([$id]);
        $myLenses = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $myLenses;
    }

    public function addLensDb($company,$model,$cameraMount,$sensor,$lensType,$focalLength,$maxAperture,$imagePath,$linkOne,$linkTwo) {
        $query = "
        INSERT INTO lenses (company, model, cameraMount_id, sensor, lensType, focalLength, maxAperture,imagePath, linkOne, linkTwo)
        values (:company, :model, :cameraMount, :sensor, :lensType, :focalLength, :maxAperture, :imagePath, :linkOne, :linkTwo)";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":cameraMount",$cameraMount,PDO::PARAM_STR);
        $stmt->bindParam(":sensor",$sensor,PDO::PARAM_STR);
        $stmt->bindParam(":lensType",$lensType,PDO::PARAM_STR);
        $stmt->bindParam(":focalLength",$focalLength,PDO::PARAM_STR);
        $stmt->bindParam(":maxAperture",$maxAperture,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteLensDb($id) {
        $query = "
        DELETE FROM lenses WHERE id = :idlens
        ";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":idlens",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateLensDb($id,$company,$model,$cameraMount,$sensor,$lensType,$focalLength,$maxAperture,$imagePath,$linkOne,$linkTwo) {
        $query = "
        UPDATE `lenses` SET `company` = :company, `model` = :model, `cameraMount_id` = :cameraMount, `sensor` = :sensor, `lensType` = :lensType, `focalLength` = :focalLength, `maxAperture` =  :maxAperture, `imagePath` = :imagePath, `linkOne` = :linkOne, `linkTwo` = :linkTwo WHERE `lenses`.`id` = :id";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":cameraMount",$cameraMount,PDO::PARAM_STR);
        $stmt->bindParam(":sensor",$sensor,PDO::PARAM_STR);
        $stmt->bindParam(":lensType",$lensType,PDO::PARAM_STR);
        $stmt->bindParam(":focalLength",$focalLength,PDO::PARAM_STR);
        $stmt->bindParam(":maxAperture",$maxAperture,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }
}