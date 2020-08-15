<!--<form action="systemUsers/login" method="post">
    <h1><?php echo $companyName; ?></h1>
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
        <?php
        if(isset($_REQUEST['returnUrl']))
        {
           echo $_REQUEST['returnUrl'];
        }

        ?>
    </div>

    <div class="clearfix"></div>

    <div class="separator">


        <div class="clearfix"></div>
        <br />

        <div>
            <h1><i class="fa fa-paw"></i>Xonib software Systems. </h1>
            <p>2014 All Rights Reserved. Xonib Software Systems. 0781587081</p>
        </div>
    </div>
</form>-->
