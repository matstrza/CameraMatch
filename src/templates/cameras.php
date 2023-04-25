<!--Page presenting all the products for a given category-->
<div class="banner cameras">
    <h1>Camera catalog</h1>
</div>
<!--Crud table shows only if admin is connected-->
<div class="crudTable">
    <?php
    if(!empty($_SESSION['userId'])){ ?>
    <div class="responsiveTable">
        <table class="crud">
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Model</th>
                <th>Lens Mount</th>
                <th>Sensor</th>
                <th>Camera Type</th>
                <th>Image</th>
                <th>Link1</th>
                <th>Link2</th>
                <th>Edit</th>
                <th>Delate</th>
            </tr>
            <?php 
            for($i=0; $i < count($args['cameras']); $i++) :
            ?>
            <tr>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getId()); ?></td>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getCompany()); ?></td>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getModel()); ?></td>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getLensMount()); ?></td>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getSensor()); ?></td>
                <td><?= Security::htmlSecurity($args['cameras'][$i]->getCameraType()); ?></td>
                <td><img src="/CameraMatch/public/img/cameras/<?= Security::htmlSecurity($args['cameras'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['cameras'][$i]->getCompany()); ?>camera, model <?= Security::htmlSecurity($args['cameras'][$i]->getModel()); ?>"></td>
                <td><a href="<?= Security::htmlSecurity($args['cameras'][$i]->getLinkOne()); ?>" target="_blank" title="Link redirecting to Amazon">Amazon</a></td>
                <td><a href="<?= Security::htmlSecurity($args['cameras'][$i]->getLinkTwo()); ?>" target="_blank" title="Link redirecting to B&Hphoto">B&H</a></td>
                <td><a href="cameras/edit/<?= Security::htmlSecurity($args['cameras'][$i]->getId()); ?>" class="editButton" title="Edit this camera">Edit</a></td>
                <td>
                    <form method="POST" action="cameras/delete">
                        <input type="hidden" name="id" value ="<?= Security::htmlSecurity($args['cameras'][$i]->getId()); ?>">
                        <button class="deleteButton" type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
            <?php
            endfor; 
            ?>
        </table>
        <a href="cameras/add" class="addProduct" title="Add new camera">Add</a>
    </div>
    <?php
    }
    ?>
</div>
<div class="filters">
    <p>Lens mount:</p>
    <button class="filter" id="all">show all</button>
    <button class="filter" id="eosM">eos M</button>
    <button class="filter" id="RF">RF</button>
    <button class="filter" id="E">E</button>
    <button class="filter" id="Z">Z</button>
    <button class="filter" id="AF">AF</button>
</div>
<div class="products">
    <?php 
        for($i=0; $i < count($args['cameras']); $i++) :
    ?>
    <div class="productCard <?= Security::htmlSecurity($args['cameras'][$i]->getLensMount()); ?>">
        <div class="productImage">
            <img src="/CameraMatch/public/img/cameras/<?= Security::htmlSecurity($args['cameras'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['cameras'][$i]->getCompany()); ?> camera, model <?= Security::htmlSecurity($args['cameras'][$i]->getModel()); ?>">
        </div>
        <div>
            <table>
                <tr>
                    <td>Company:</td>
                    <td><?= Security::htmlSecurity($args['cameras'][$i]->getCompany()); ?></td>
                </tr>
                <tr>
                    <td>Model:</td>
                    <td><?= Security::htmlSecurity($args['cameras'][$i]->getModel()); ?></td>
                </tr>
                <tr>
                    <td>Lens mount:</td>
                    <td><?= Security::htmlSecurity($args['cameras'][$i]->getLensMount()); ?></td>
                </tr>
                <tr>
                    <td>Sensor type:</td>
                    <td><?= Security::htmlSecurity($args['cameras'][$i]->getSensor()); ?></td>
                </tr>
                <tr>
                    <td>Camera type:</td>
                    <td><?= Security::htmlSecurity($args['cameras'][$i]->getCameraType()); ?></td>
                </tr>
            </table>
        </div>
        <div class="productButtons">
            <a href="<?= Security::htmlSecurity($args['cameras'][$i]->getLinkOne()); ?>" target=”_blank” class="btn amazon" title="Find this camera at Amazon">Amazon</a>
            <a href="<?= Security::htmlSecurity($args['cameras'][$i]->getLinkTwo()); ?>" target=”_blank” class="btn bhphoto" title="Find this lens at B&Hphoto">B&H</a>
        </div>
    </div>
    <?php
    endfor;
    ?>
</div>   
