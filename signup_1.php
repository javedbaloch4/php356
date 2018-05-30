<?php
require_once 'views/header.php';
//require_once 'views/header_banner.php';
//require_once 'views/slider.php';
require_once 'views/middle_left.php';
?>


<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    

<div id="form-container">

    <div id="heading-row">Sign Up</div>

    <form action="processSignUp.html" method="post" enctype="multipart/form-data" id="signup-form">

        <div class="row">
            <div class="cell cell-left">First Name</div>
            <div class="cell cell-right">
                <input type="text" id="firstName" name="firstName" value="" placeholder="First Name"  >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Middle Name</div>
            <div class="cell cell-right">
                <input type="text" id="middleName" name="middleName" value="" placeholder="Middle Name" >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Last Name</div>
            <div class="cell cell-right">
                <input type="text" id="lastName" name="lastName" value="" placeholder="Last Name"  >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Email</div>
            <div class="cell cell-right">
                <input type="text" id="email" name="email" value="" placeholder="Email"  >            
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">User Name</div>
            <div class="cell cell-right">
                <input type="text" id="userName" name="userName" value="" placeholder="User Name"  >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Password</div>
            <div class="cell cell-right">
                <input type="password" id="password" name="password" value="" placeholder="Password"  >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Re-type Password</div>
            <div class="cell cell-right">
                <input type="password" id="password2" name="password2" value="" placeholder="Re-type Password" >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Contact Number</div>
            <div class="cell cell-right">
                <input type="text" id="contactNumber" name="contactNumber" value="" maxlength="16"   placeholder="Contact Number">
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Gender : </div>
            <div class="cell cell-right">
                Male <input type="radio" id="Male" name="gender" value="Male"> - 
                Female <input type="radio" id="Female" name="gender" value="Female">
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>	
        </div>

        <div class="row">
            <div class="cell cell-left">Interest : </div>
            <div class="cell cell-right">
                Laptop <input type="checkbox" id="Laptop" name="interests[]" value="Laptop"> - 
                Mobile <input type="checkbox" id="Mobile" name="interests[]" value="Mobile">        	
                IPad <input type="checkbox" id="IPad" name="interests[]" value="IPad">        	
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Date Of Birth</div>
            <div class="cell cell-right">
                <input type="text" id="dateOfBirth" name="dateOfBirth" value="" placeholder="dd-mm-YYYY">
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Street Address</div>
            <div class="cell cell-right">
                <textarea id="streetAddress" name="streetAddress" class="street_address"   placeholder="Street Address"></textarea>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>


        <div class="row">
            <div class="cell cell-left">City</div>
            <div class="cell cell-right">
                <input type="text" id="city" name="city"   placeholder="City" value="">
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>	
        </div>

        <div class="row">
            <div class="cell cell-left">State</div>
            <div class="cell cell-right">
                <input type="text" id="state" name="state"  placeholder="State" value="">
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Country</div>
            <div class="cell cell-right">

                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">Profile Image </div>
            <div class="cell cell-right">
                <input type="file" id="profileImage" name="profileImage" >
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">
                <div class="cell cell-right"><a href="#">Login</a></div>
            </div>
            <div class="cell cell-right">
                <input type="submit" value="Register" >
            </div>
            <div class="clear-box"></div>
        </div>

    </form>

</div>



<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    

<?php
require_once 'views/footer.php';
