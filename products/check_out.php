<?php
require_once '../models/User.php';
require_once '../models/Brand.php';
require_once '../models/Cart.php';
require_once '../models/Location.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<div id="form-container">
<?php
if(isset($_SESSION['obj_contact'])){
    $obj_contact = unserialize($_SESSION['obj_contact']);
}
else{
    $obj_contact = new User();
}
?>
    <div id="heading-row">Place Order</div>

    <form action="<?php echo(BASE_URL);?>users/process/update_account.php" method="post" id="update-form">

        <div class="row">
            <div class="cell cell-left">First Name</div>
            <div class="cell cell-right">
                <input type="text" id="firstName" name="firstName" value="<?php echo($obj_contact->first_name); ?>" placeholder="First Name"  >
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
            <div class="cell cell-left">Contact Number</div>
            <div class="cell cell-right">
                <input type="text" id="contactNumber" name="contactNumber" value="" maxlength="16"   placeholder="Contact Number">
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
            <div class="cell cell-left">Country</div>
            <div class="cell cell-right">
                <select id="country" name="country">
                    <option value="">---Country---</option>
                    <?php
                    $countries = Location::get_countries();
                    foreach($countries as $c){
                        echo("<option value='$c->id' ");
                        
                        if($obj_contact->country_id == $c->id){
                            echo("selected");
                        }
                        echo(">$c->country_name</option>");
                    }
                    ?>
                </select>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="row">
            <div class="cell cell-left">State</div>
            <div class="cell cell-right">
                <select id="state" name="state">
                    <option value="">---State---</option>
                </select>
                <span class="field-msg state"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        

        <div class="row">
            <div class="cell cell-left">City</div>
            <div class="cell cell-right">
                <select id="city" name="city">
                    <option value="">---City---</option>
                </select>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>	
        </div>

        <div class="row">
                <input type="submit" value="Update" >
            <div class="clear-box"></div>
        </div>

    </form>

</div>

<script type="text/javascript">
$(document).ready(function(e){
    $("#country").change(function(e){
        
        $("#state > option~option").remove();
        $("#city > option~option").remove();
        var country = $("#country").val();
        if(country == ""){
            return;
        }
        
//        $.ajax();
//        $.ajax({});

//        var form_data = $("#update-form").serializeArray();
//        $.ajax({
//            url: "<?php // echo(BASE_URL);?>users/process/get_location_data.php",
//            type: 'POST',
//            data: form_data,
//            
//        });

//        $.ajax({
//            url: "<?php echo(BASE_URL);?>users/process/get_location_data.php",
//            type: 'POST',
//            data: {
//                country: country,
//            },
//            
//        });

        
        var data = {};
        data['country'] = country;
        
//        console.log(data);
//        return;
    var state_id = <?php echo($obj_contact->state_id);?>;
        $.ajax({
            url: "<?php echo(BASE_URL);?>users/process/get_location_data.php",
            type: 'POST',
            data: data,
            beforeSend: function (xhr) {
                $(".state").html("<img src='<?php echo(BASE_URL);?>images/ajax-loader.gif'>");
            },
            complete: function (jqXHR, textStatus ) {
              //jqXHR JQuery XMLHTTPREQUEST
                if(jqXHR.status == 200){
                    var result = jqXHR.responseText;
                    result = $.parseJSON(result);
                    if(result.hasOwnProperty('success')){
                        
                        if(result.hasOwnProperty('states')){
                            var output = "";
                            $.each(result.states, function(index, state){
                                output += "<option value='"+state.id+"' ";
                                
                                if(state_id == state.id){
                                    output += "selected";
                                }
                                
                                output += ">"+state.state_name+"</option>";
                            });
                            $("#state").append(output);
                        }
                        else{
                            alert("States Missing");
                        }
                    }
                    else if(result.hasOwnProperty('error')){
//                        alert(result['msg']);
                        alert(result.msg);
                    }
                }
                else{
                    alert("Conact Support - " + jqXHR.status);
                }
                $(".state").html("");                
            }
            
            
        });

    });
});
</script>    

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
    
<?php
require_once '../views/footer.php';
