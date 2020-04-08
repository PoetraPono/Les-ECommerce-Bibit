<nav class="navbar navbar-dark" style="border-color:none; background-color: #e34547;border-radius: none;">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="profil.php"><b>Kebun Strawberry Organik Cemara</b></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja</a></li>
            <li><a href="profil.php"><span class="glyphicon glyphicon-briefcase"></span> Profil Usaha</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION["member"])) : ?>
                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                <li><a href="checkout.php"><span class="glyphicon glyphicon-check"></span> Checkout</a></li>
            <?php else : ?>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
            <?php endif ?>
        </ul>
    </div>
</nav>