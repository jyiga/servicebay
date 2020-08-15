<div id="dlgsystemUser" class="easyui-dialog" closed="true" style="width:800px; height:auto; padding:3px;" toolbar="#systemUserbutton" modal="true" >
<form id="frmsystemUser" name="frmsystemUser" method="post">
    <div class="col-lg-6">
        <div class='form-group' style='' ><label>First Name</label><input name='firstName' value='' id='firstName' class='form-control' type='text' /> </div>
        <div class='form-group' style='' ><label>Last Name</label><input name='lastName' value='' id='lastName' class='form-control' type='text' /> </div>
        <div class='form-group' style='' ><label>D.O.B</label><input name='dob' value='' id='dob' class='form-control' type='text' /> </div>
        <div class='form-group' style='' ><label>Contact</label><input name='contact' value='' id='contact' class='form-control' type='text' /> </div>
        </div>
    <div class="col-lg-6">
<div class='form-group' style='' ><label>Email</label><input name='email' value='' id='email' class='form-control' type='text' /> </div>
<div class='form-group' style='' ><label>State</label><input name='isActive' value='1' id='isActive' class='flat' type='checkbox' /> </div>
<div class='form-group' style='' ><label>Username</label><input name='username' value='' id='username' class='form-control' type='text' /> </div>
<div class='form-group' style='' ><label>Password</label><input name='password' value='' id='password' class='form-control' type='password' onblur="confirmPasswordFocus()" /> </div>
        <div class='form-group' style='' ><label>Confirm Password</label><input name='confirmpassword' value='' id='confirmpassword' class='form-control' type='password' onfocus="confirmPasswordFocus()" onblur="confirmPasswordMatch()" /> </div>
    <div class='form-group' id="passwordCheck"></div>
    </div>
</form>
</div>
<div id="systemUserbutton">
    <a href="#" class="btn btn-primary" onclick="savesystemUser()">Save</a>&nbsp;&nbsp;
    <a href="javascript:$('#dlgsystemUser').dialog('close')" class="btn btn-primary" >Close</a>
</div>
