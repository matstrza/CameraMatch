<!--Form for editing specific lenses-->
<?php
if(AdminManager::verifyConnectionAdmin()){ ?>
<div>
    <p>Edit :<?= Security::htmlSecurity($args['lens']['company']); ?> <?= Security::htmlSecurity($args['lens']['model']); ?></p>
    <form method="POST" action="../editValidator" enctype="multipart/form-data" class="form">
        <div>
            <input type='hidden' value="<?= Security::htmlSecurity($args['lens']['id']);?>" name='id' >
        </div>
        <div>
            <label>Company: </label>
            <input type="text" id="company" name="company" value="<?= Security::htmlSecurity($args['lens']['company']); ?>">
        </div>
        <div>
            <label>Model: </label>
            <input type="text" id="model" name="model" value="<?= Security::htmlSecurity($args['lens']['model']); ?>">
        </div>
        <div>
            <label>Camera mount: </label>
            <select name="cameraMount_id">
                <option label="<?= Security::htmlSecurity($args['lens']['camera_mount']); ?>" value="<?= Security::htmlSecurity($args['lens']['cameraMount_id']); ?>">
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
            <label>Sensor: </label>
            <select name="sensor">
                <option label="<?= Security::htmlSecurity($args['lens']['sensor']); ?>" value="<?= Security::htmlSecurity($args['lens']['sensor']); ?>">
                <optgroup label="Change sensor:">
                    <option label="APS-C" value="APS-C">
                    <option label="Full frame" value="Full frame">
                    <option label="M43" value="M43">
                </optgroup>
            </select>
        </div>
        <div>
            <!--Value is picked up and goes to DB-->
            <label>Lens type: </label>
            <select name="lensType">
                <option label="<?= Security::htmlSecurity($args['lens']['lensType']); ?>" value="<?= Security::htmlSecurity($args['lens']['lensType']); ?>">
                <optgroup label="Change lens type:">
                    <option label="Prime" value="Prime">
                    <option label="Zoom" value="Zoom">
                </optgroup>
            </select>
        </div>
        <div>
            <label>Focal length: </label>
            <input type="text" id="focalLength" name="focalLength" value="<?= Security::htmlSecurity($args['lens']['focalLength']); ?>">
        </div>
        <div>
            <label>Max aperture: </label>
            <input type="text" id="maxAperture" name="maxAperture" value="<?= Security::htmlSecurity($args['lens']['maxAperture']); ?>">
        </div>
        <div>
            <label>Image path: </label>
            <input type="text" id="imagePath" name="imagePath" value="<?= Security::htmlSecurity($args['lens']['imagePath']); ?>">
        </div>
        <div>
            <label>Link one: </label>
            <input type="text" id="linkOne" name="linkOne" value="<?= Security::htmlSecurity($args['lens']['linkOne']); ?>">
        </div>
        <div>
            <label>Link two: </label>
            <input type="text" id="linkTwo" name="linkTwo" value="<?= Security::htmlSecurity($args['lens']['linkTwo']); ?>">
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