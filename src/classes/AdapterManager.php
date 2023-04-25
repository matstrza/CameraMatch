<?php

class AdapterManager extends Db{
    private $adapters;//array

    public function addAdapter($adapter){
        $this->adapters[] = $adapter;
    }

    public function getAdapters(){
        return $this->adapters;
    }

    public function loadAdapters(){
        $query = $this->getDb()->prepare("
        SELECT a.id, a.company, a.model, cm.camera_mount, lm.lens_mount, a.type, a.imagePath, a.linkOne, a.linkTwo
        FROM adapters a
        INNER JOIN lens_mounts lm ON a.lensMount_id = lm.id
        INNER JOIN camera_mounts cm ON a.cameraMount_id = cm.id
        ORDER BY a.company, a.model
        ");
        $query->execute();
        $myAdapters = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myAdapters as $adapter){
            $a = new Adapter($adapter['id'],$adapter['company'],$adapter['model'],$adapter['camera_mount'],$adapter['lens_mount'],$adapter['type'],$adapter['imagePath'],$adapter['linkOne'],$adapter['linkTwo']);
            $this->addAdapter($a);
        }
    }
    
    public function adapterById($id){
        $query = $this->getDb()->prepare("
        SELECT a.id, a.company, a.model, a.cameraMount_id, a.lensMount_id, cm.camera_mount, lm.lens_mount, a.type, a.imagePath, a.linkOne, a.linkTwo
        FROM adapters a
        INNER JOIN lens_mounts lm ON a.lensMount_id = lm.id
        INNER JOIN camera_mounts cm ON a.cameraMount_id = cm.id
        WHERE a.id = ?
        ");
        $query->execute([$id]);
        $myAdapters = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $myAdapters;
    }

    public function addAdapterDb($company,$model,$cameraMount,$lensMount,$type,$imagePath,$linkOne,$linkTwo){
        $query = "
        INSERT INTO adapters (company, model, cameraMount_id, lensMount_id, type, imagePath, linkOne, linkTwo)
        values (:company, :model, :cameraMount, :lensMount, :type, :imagePath, :linkOne, :linkTwo)";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":cameraMount",$cameraMount,PDO::PARAM_STR);
        $stmt->bindParam(":lensMount",$lensMount,PDO::PARAM_STR);
        $stmt->bindParam(":type",$type,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteAdapterDb($id){
        $query = "
        DELETE FROM adapters WHERE id = :idadapter
        ";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":idadapter",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateAdapterDb($id,$company,$model,$cameraMount,$lensMount,$type,$imagePath,$linkOne,$linkTwo){
        $query = "
        UPDATE `adapters` SET `company` = :company, `model` = :model, `cameraMount_id` = :cameraMount, `lensMount_id` = :lensMount, `type` = :type, `imagePath` = :imagePath, `linkOne` = :linkOne, `linkTwo` = :linkTwo WHERE `adapters`.`id` = :id";
        $stmt = $this->getDb()->prepare($query);
        $stmt->bindParam(":company",$company,PDO::PARAM_STR);
        $stmt->bindParam(":model",$model,PDO::PARAM_STR);
        $stmt->bindParam(":cameraMount",$cameraMount,PDO::PARAM_STR);
        $stmt->bindParam(":lensMount",$lensMount,PDO::PARAM_STR);
        $stmt->bindParam(":type",$type,PDO::PARAM_STR);
        $stmt->bindParam(":imagePath",$imagePath,PDO::PARAM_STR);
        $stmt->bindParam(":linkOne",$linkOne,PDO::PARAM_STR);
        $stmt->bindParam(":linkTwo",$linkTwo,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }
}