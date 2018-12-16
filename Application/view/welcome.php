<h2>
    <a href="<?=SITE_URL;?>/posts/show">showpost</a>

</h2>
<h1><a href="<?=SITE_URL;?>/logout">logout</a>
</h1>

<h1>POST CREATE</h1>

<form id="Login" action="<?=SITE_URL;?>/posts/create" method="post">
    <?php
    if(isset($_SESSION['statu']))
    {
        ?>
        <p class="login-box-msg">
            <?=$_SESSION['statu'];?>
        </p>  <?php
    }
    ?>

    <?php
    if(isset($_SESSION['email']))
    {
        ?>
        <p class="login-box-msg">
            Welcome
            <?=$_SESSION['email'];?>
        </p>  <?php
    }
    ?>

    <p></p>
    <div class="form-group">


        <input name="title" type="text" class="form-control" id="inputEmail" placeholder="Tite">

    </div>

    <div class="form-group">

        <input name="description" type="text" class="form-control" id="inputPassword" placeholder="description">

    </div>


    <button type="submit" class="btn btn-primary">post create</button>

</form>

