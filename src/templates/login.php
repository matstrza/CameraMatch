<!--Login form to connect to the CRUD functions-->
<div>
    <form class="form" action="login" method="POST">
        <input type="text" name="username" placeholder="Your username" id="username" required>
        <input type="password" name="password" placeholder="Your password" id="password" required>
        <button type="submit" name="submit" class="btn" id="login">Login</button>
        <?php  
        if(isset($_SESSION['error'])): ?>
        <p class="loginError"> <?= $_SESSION['error']; 
        unset($_SESSION['error']); ?></p>
        <?php endif; ?>
    </form>
</div>  