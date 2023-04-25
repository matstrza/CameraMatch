<!--Form for editing specific cameras-->
<?php
if(AdminManager::verifyConnectionAdmin()){ ?>
<div>
    <p>Edit :<?= Security::htmlSecurity($args['camera']['company']); ?> <?= Security::htmlSecurity($args['camera']['model']); ?></p>
    <form method="POST" action="../editValidator" enctype="multipart/form-data" class="form">
        <div>
            <input type='hidden' value="<?= Security::htmlSecurity($args['camera']['id']);?>" name='id' >
        </div>
        <div>
            <label>Company: </label>
            <input type="text" id="company" name="company" value="<?= Security::htmlSecurity($args['camera']['company']); ?>">
        </div>
        <div>
            <label>Model: </label>
            <input type="text" id="model" name="model" value="<?= Security::htmlSecurity($args['camera']['model']); ?>">
        </div>
        <div>
            <label>Lens mount: </label>
            <select name="lensMount_id">
                <option label="<?= Security::htmlSecurity($args['camera']['lens_mount']); ?>" value="<?= Security::htmlSecurity($args['camera']['lensMount_id']); ?>">
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
            <label>Sensor: </label>
            <select name="sensor">
                <option label="<?= Security::htmlSecurity($args['camera']['sensor']); ?>" value="<?= Security::htmlSecurity($args['camera']['sensor']); ?>">
                <optgroup label="Change sensor:">
                    <option label="APS-C" value="APS-C">
                    <option label="Full frame" value="Full frame">
                    <option label="M43" value="M43">
                </optgroup>
            </select>
        </div>
        <div>
            <!--Value is picked up and goes to DB-->
            <label>Camera type: </label>
            <select name="cameraType">
                <option label="<?= Security::htmlSecurity($args['camera']['cameraType']); ?>" value="<?= Security::htmlSecurity($args['camera']['cameraType']); ?>">
                <optgroup label="Change camera type:">
                    <option label="Mirrorless" value="Mirrorless">
                    <option label="DSLR" value="DSLR">
                </optgroup>
            </select>
        </div>
        <div>
            <label>Image path: </label>
            <input type="text" id="imagePath" name="imagePath" value="<?= Security::htmlSecurity($args['camera']['imagePath']); ?>">
        </div>
        <div>
            <label>Link one: </label>
            <input type="text" id="linkOne" name="linkOne" value="<?= Security::htmlSecurity($args['camera']['linkOne']); ?>">
        </div>
        <div>
            <label>Link two: </label>
            <input type="text" id="linkTwo" name="linkTwo" value="<?= Security::htmlSecurity($args['camera']['linkTwo']); ?>">
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