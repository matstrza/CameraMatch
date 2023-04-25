<!--Form for editing specific adapters-->
<?php
if(AdminManager::verifyConnectionAdmin()){ ?>
<div>
    <p>Edit :<?= Security::htmlSecurity($args['adapter']['company']); ?> <?= Security::htmlSecurity($args['adapter']['model']); ?></p>
    <form method="POST" action="../editValidator" enctype="multipart/form-data" class="form">
        <div>
            <input type='hidden' value="<?= Security::htmlSecurity($args['adapter']['id']);?>" name='id'>
        </div>
        <div>
            <label>Company: </label>
            <input type="text" id="company" name="company" value="<?= Security::htmlSecurity($args['adapter']['company']); ?>">
        </div>
        <div>
            <label>Model: </label>
            <input type="text" id="model" name="model" value="<?= Security::htmlSecurity($args['adapter']['model']); ?>">
        </div>
        <div>
            <label>Camera mount: </label>
            <select name="cameraMount_id">
                <option label="<?= Security::htmlSecurity($args['adapter']['camera_mount']); ?>" value="<?= Security::htmlSecurity($args['adapter']['cameraMount_id']); ?>">
                <optgroup label="Change camera mount:">
                    <option label="eos M" value="1">
                    <option label="RF" value="2">
                    <option label="E" value="3">
                    <option label="Z" value="4">
                    <option label="AF" value="5">
                </optgroup>
            </select>
        </div>
        <div>
            <label>Lens mount: </label>
            <select name="lensMount_id">
                <option label="<?= Security::htmlSecurity($args['adapter']['lens_mount']); ?>" value="<?= Security::htmlSecurity($args['adapter']['lensMount_id']); ?>">
                <optgroup label="Change lens mount:">
                    <option label="eos M" value="1">
                    <option label="RF" value="2">
                    <option label="E" value="3">
                    <option label="Z" value="4">
                    <option label="AF" value="5">
                </optgroup>
            </select>
        </div>
        <div>
            <label>Adapter type: </label>
            <select name="type">
                <option label="<?= Security::htmlSecurity($args['adapter']['type']); ?>" value="<?= Security::htmlSecurity($args['adapter']['type']); ?>">
                <optgroup label="Change adapter type:">
                    <option label="Adapter" value="Adapter">
                    <option label="Booster" value="Booster">
                </optgroup>
            </select>
        </div>
        <div>
            <label>Image path: </label>
            <input type="text" id="imagePath" name="imagePath" value="<?= Security::htmlSecurity($args['adapter']['imagePath']); ?>">
        </div>
        <div>
            <label>Link one: </label>
            <input type="text" id="linkOne" name="linkOne" value="<?= Security::htmlSecurity($args['adapter']['linkOne']); ?>">
        </div>
        <div>
            <label>Link two: </label>
            <input type="text" id="linkTwo" name="linkTwo" value="<?= Security::htmlSecurity($args['adapter']['linkTwo']); ?>">
        </div>
        <button type="submit" class="btn">Save</button>
    </form>
</div>
<?php 
} else { 
?>
<p class="connectionError">ACCESS DENIED...</p>
<?php 
} 
?>