<!--Header present on each page-->
<header>
    <nav class="navbar">
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <a href="/CameraMatch/" title="Mainpage"><img src="/CameraMatch/public/img/logo.svg" alt="Logo of Camera Match" class="logo"></a>
        <ul class="navMenu">
            <li>
                <a href="/CameraMatch/about" class="menuLink" title="Learn more about CameraMatch">About</a>
            </li>
            <li>
                <a href="/CameraMatch/lenses" class="menuLink" title="See our catalog of lenses">Lenses</a>
            </li>
            <li>
                <a href="/CameraMatch/cameras" class="menuLink" title="See our catalog of cameras">Cameras</a>
            </li>
            <li>
                <a href="/CameraMatch/adapters" class="menuLink" title="See our catalog of adapters">Adapters</a>
            </li>
            <?php 
            if(!empty($_SESSION['userId'])){ 
            ?>
            <li>
                <a href="/CameraMatch/logout" class="menuLink" title="Click to logout">Logout</a>
            </li>
            <?php 
            } 
            ?>
        </ul>
    </nav>
</header> 