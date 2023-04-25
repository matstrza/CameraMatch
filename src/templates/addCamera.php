<!--Form for adding new cameras-->
<?php
if(AdminManager::verifyConnectionAdmin()) { ?>
<div>
    <form method="POST" action="addValidator" enctype="multipart/form-data" class="addProduct form">
        <div>
            <label>Company: </label>
            <input type="text" class="form-control" id="company" name="company">
        </div>
        <div>
            <label>Model: </label>
            <input type="text" id="model" name="model">
        </div>
        <div>
            <label>Lens mount: </label>
            <select name="lensMount">
                <option label="eos M" value="1">
                <option label="RF" value="2">
                <option label="E" value="3">
                <option label="Z" value="4">
                <option label="AF" value="5">
            </select>
        </div>
        <div>
            <label>Sensor: </label>
            <select name="sensor">
                <option label="APS-C" value="APS-C">
                <option label="Full frame" value="Full frame">
                <option label="M43" value="M43">
            </select>
        </div>
        <div>
            <label>Camera Type: </label>
            <select name="cameraType">
                <option label="Mirrorless" value="Mirrorless">
                <option label="DSLR" value="DSLR">
            </select>
        </div>
        <div>
            <label>Image Path: </label>
            <input type="text" id="imagePath" name="imagePath">
        </div>
        <div>
            <label>Link one: </label>
            <input type="text" id="linkOne" name="linkOne">
        </div>
        <div>
            <label>Link two: </label>
            <input type="text" id="linkTwo" name="linkTwo">
        </div>
        <button type="submit" class="btn">Add</button>
    </form>
</div>    
<?php
} else { 
?>
<p class="connectionError">ACCESS DENIED...</p>
<?php 
} 
?>