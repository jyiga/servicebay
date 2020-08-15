<form action="controller/systemUserController.php" method="post">
    <h1>Pathmark Logistic Limited</h1>
    <div>
        <input type="text" class="form-control" placeholder="Username" name="username" required="" />
    </div>
    <div>
        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
    </div>
    <?php
    if(isset($_REQUEST['returnUrl']))
    {
        echo '<div><input type="hidden" class="form-control"  name="returnUrl" value="'.$_REQUEST['returnUrl'].'" /></div>';
    }
    ?>
    <div>
        <input type="submit" name="action" value="LOGIN" class="btn btn-success submit" />
        <a class="reset_pass" href="#">Lost your password?</a>
    </div>

    <div class="clearfix"></div>

    <div class="separator">


        <div class="clearfix"></div>
        <br />

        <div>
            <h1><i class="fa fa-paw"></i> REFIXED FLEET SOLUTION</h1>
            <p>©2013 All Rights Reserved. Binox Africa Software. Privacy and Terms</p>
        </div>
    </div>
</form>