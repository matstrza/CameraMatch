<!--Page presenting all the products for a given category-->
<div class="banner lenses">
    <h1>Lenses catalog</h1>
</div>
<!--Crud table shows only if admin is connected-->
<div class="crudTable">    
    <?php
    if(!empty($_SESSION['userId'])){ 
    ?>
    <div class="responsiveTable">
        <table class="crud">
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Model</th>
                <th>Camera mount</th>
                <th>Sensor</th>
                <th>Camera type</th>
                <th>Focal length</th>
                <th>Max aperture</th>
                <th>Image</th>
                <th>Link1</th>
                <th>Link2</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
            for($i=0; $i < count($args['lenses']); $i++) :
            ?>
            <tr>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getId()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getCompany()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getModel()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getCameraMount()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getSensor()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getLensType()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getFocalLength()); ?></td>
                <td><?= Security::htmlSecurity($args['lenses'][$i]->getMaxAperture()); ?></td>
                <td><img src="/CameraMatch/public/img/lenses/<?= Security::htmlSecurity($args['lenses'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['lenses'][$i]->getCompany()); ?> lens, model <?= Security::htmlSecurity($args['lenses'][$i]->getModel()); ?>"></td>
                <td><a href="<?= Security::htmlSecurity($args['lenses'][$i]->getLinkOne()); ?>" target=”_blank” title="Link redirecting to Amazon">Amazon</a></td>
                <td><a href="<?= Security::htmlSecurity($args['lenses'][$i]->getLinkTwo()); ?>" target=”_blank” title="Link redirecting to B&Hphoto">B&H</a></td>
                <td><a href="lenses/edit/<?= Security::htmlSecurity($args['lenses'][$i]->getId()); ?>" class="editButton" title="Edit this lens">Edit</a></td>
                <td>
                    <form method="POST" action="lenses/delete">
                        <input type="hidden" name="id" value ="<?= Security::htmlSecurity($args['lenses'][$i]->getId()); ?>">
                        <button type="submit" class="deleteButton">Delete</button>
                    </form>
                </td>
            </tr>
            <?php 
            endfor; 
            ?>
        </table>
        <a href="lenses/add" class="addProduct" title="Add new lens">Add</a>
    </div>
    <?php 
    } 
    ?>
</div>
<div class="filters">
    <p>Camera mount:</p>
    <button class="filter" id="all">show all</button>
    <button class="filter" id="eosM">eos M</button>
    <button class="filter" id="RF">RF</button>
    <button class="filter" id="E">E</button>
    <button class="filter" id="Z">Z</button>
    <button class="filter" id="AF">AF</button>
</div>
<div class="products">
    <?php 
        for($i=0; $i < count($args['lenses']); $i++) :
    ?>
    
    
    
    <div class="productCard <?= Security::htmlSecurity($args['lenses'][$i]->getCameraMount()); ?>">
        <div class="productImage">
            <img src="/CameraMatch/public/img/lenses/<?= Security::htmlSecurity($args['lenses'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['lenses'][$i]->getCompany()); ?> lens, model <?= Security::htmlSecurity($args['lenses'][$i]->getModel()); ?>">
        </div>
        <div> 
            <table>
                <tr>
                    <td>Company:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getCompany()); ?></td>
                </tr>
                <tr>
                    <td>Model:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getModel()); ?></td>
                </tr>
                <tr>
                    <td>Camera mount:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getCameraMount()); ?></td>
                </tr>
                <tr>
                    <td>Sensor type:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getSensor()); ?></td>
                </tr>
                <tr>
                    <td>Lens type:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getLensType()); ?></td>
                </tr>
                <tr>
                    <td>Focal Length:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getFocalLength()); ?></td>
                </tr>
                <tr>
                    <td>Max Aperture:</td>
                    <td><?= Security::htmlSecurity($args['lenses'][$i]->getMaxAperture()); ?></td>
                </tr>
            </table>
        </div> 
        <div class="productButtons">
            <a href="<?= Security::htmlSecurity($args['lenses'][$i]->getLinkOne()); ?>" target="_blank" class="amazon btn" title="Find this lens at Amazon">Amazon</a>
            <a href="<?= Security::htmlSecurity($args['lenses'][$i]->getLinkTwo()); ?>" target="_blank" class="bhphoto btn" title="Find this lens at B&Hphoto">B&H</a>
        </div>
    </div>
    <?php 
    endfor; 
    ?>
</div>