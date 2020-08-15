 <!-- /NAVIGATION -->
 <div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Sign up</li>
			</ul>
		</div>
	</div>
	<!-- HOME -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
            <form id="checkout-form" class="clearfix" method="post" action='register'>
                <div class="col-md-12">
                    <div class="billing-details">
                        <p>Already have an account ? <a href="#">Login</a></p>
                            <div class="section-title">
                                <h3 class="title">User account  Details</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>First Name</label>
                                    <input class="input" type="text" name="firstName" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                <label>Mobile Number</label>
                                    <input class="input" type="tel" name="tel" placeholder="Mobile Number">
                                </div>
                                <div class='form-group'>
                                    <label>Here As?</label>
                                    <select id='userTypeId' name='userTypeId' class='easyui-combobox form-control' style='height:30px; width:100%;'  data-options="url:'../userTypes/viewcombobox',valueField:'id',textField:'userType',panelWidth:'450',panelHeight:'auto'" ></select>
                                </div>
                                <div class="form-group">
                                <label>Confirm Password</label>
                                    <input class="input" type="cpassword" name="cpassword" placeholder="Confirm Password"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Last Name</label>
                                    <input class="input" type="text" name="lastName" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                <label>Email</label>
                                    <input class="input" type="email" name="email" placeholder="Email"  required>
                                </div>
                                <div class="form-group">
                                <label>Password</label>
                                    <input class="input" type="password" name="password" placeholder="Password"  required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-action">
                                <input class="btn btn-success" type="submit"  value="signup">&nbsp;&nbsp;<input class="btn btn-danger" type="reset"  value="Cancel">
                                </div>
                            </div>

                    </div>
                </div>
            </form>         

            </div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->