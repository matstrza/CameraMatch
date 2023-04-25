<!--Page presenting all the products for a given category-->
<div class="banner adapters">
    <h1>Adapters catalog</h1>
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
                <th>Lens mount</th>
                <th>Type</th>
                <th>Image</th>
                <th>Link1</th>
                <th>Link2</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
            for($i=0; $i < count($args['adapters']); $i++) :
            ?>
            <tr>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getId()); ?></td>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getCompany()); ?></td>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getModel()); ?></td>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getCameraMount()); ?></td>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getLensMount()); ?></td>
                <td><?= Security::htmlSecurity($args['adapters'][$i]->getType()); ?></td>
                <td><img src="/CameraMatch/public/img/adapters/<?= Security::htmlSecurity($args['adapters'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['adapters'][$i]->getCompany()); ?> adapter, model <?= Security::htmlSecurity($args['adapters'][$i]->getModel()); ?>"></td>
                <td><a href="<?= Security::htmlSecurity($args['adapters'][$i]->getLinkOne()); ?>" target=”_blank” title="Link redirecting to Amazon">Amazon</a></td>
                <td><a href="<?= Security::htmlSecurity($args['adapters'][$i]->getLinkTwo()); ?>" target=”_blank” title="Link redirecting to B&Hphoto">B&H</a></td>
                <td><a href="adapters/edit/<?= Security::htmlSecurity($args['adapters'][$i]->getId()); ?>" class="editButton" title="Edit this adapter">Edit</a></td>
                <td>
                    <form method="POST" action="adapters/delete">
                        <input type="hidden" name="id" value ="<?= Security::htmlSecurity($args['adapters'][$i]->getId()); ?>">
                        <button  type="submit" class="deleteButton">Delete</button>
                    </form>
                </td>
            </tr>
            <?php 
            endfor; 
            ?>
        </table>
        <a href="adapters/add" class="addProduct" title="Add new adapter">Add</a>
    </div>
    <?php 
    } 
    ?>
</div>
<div class="filters">
    <p>Mount system:</p>
    <button class="filter" id="all">show all</button>
    <button class="filter" id="eosM">eos M</button>
    <button class="filter" id="RF">RF</button>
    <button class="filter" id="E">E</button>
    <button class="filter" id="Z">Z</button>
    <button class="filter" id="AF">AF</button>
</div>
<div class="products">
    <?php 
        for($i=0; $i < count($args['adapters']); $i++) :
    ?>
    <div class="productCard <?= Security::htmlSecurity($args['adapters'][$i]->getLensMount()); ?> <?= Security::htmlSecurity($args['adapters'][$i]->getCameraMount()); ?>">
        <div class="productImage">
            <img src="/CameraMatch/public/img/adapters/<?= Security::htmlSecurity($args['adapters'][$i]->getImagePath()); ?>" alt="Image of a <?= Security::htmlSecurity($args['adapters'][$i]->getCompany()); ?> adapter, model <?= Security::htmlSecurity($args['adapters'][$i]->getModel()); ?>">
        </div>
        <div>
            <table>
                <tr>
                    <td>Company:</td>
                    <td><?= Security::htmlSecurity($args['adapters'][$i]->getCompany()); ?></td>
                </tr>
                <tr>
                    <td>Model:</td>
                    <td><?= Security::htmlSecurity($args['adapters'][$i]->getModel()); ?></td>
                </tr>
                <tr>
                    <td>Camera mount:</td>
                    <td><?= Security::htmlSecurity($args['adapters'][$i]->getCameraMount()); ?></td>
                </tr>
                <tr>
                    <td>Lens mount:</td>
                    <td><?= Security::htmlSecurity($args['adapters'][$i]->getLensMount()); ?></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><?= Security::htmlSecurity($args['adapters'][$i]->getType()); ?></td>
                </tr>
            </table>
        </div>
        <div class="productButtons">
            <a href="<?= Security::htmlSecurity($args['adapters'][$i]->getLinkOne()); ?>" target="_blank" class="amazon btn" title="Find this lens at Amazon">Amazon</a>
            <a href="<?= Security::htmlSecurity($args['adapters'][$i]->getLinkTwo()); ?>" target="_blank" class="bhphoto btn" title="Find this lens at B&Hphoto">B&H</a>
        </div>
    </div>
    <?php 
        endfor; 
    ?>
</div>   
