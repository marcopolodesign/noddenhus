jQuery(document).ready(function ($) {
    var data, provincia, codigo, localidades;
    var base_url = window.location.origin;
    $('input#temporary_postcode').on('input', function () {
        var postcode = $(this).val();
        if (postcode.length == 4) {
            $('#billing_city').css('opacity','.3');
            $('.state_select').css('opacity','.3');
            $('#billing_state + .select2').css('opacity','.3');
            $.ajax({
                type: "post",
                url: base_url + '/wp-admin/admin-ajax.php',
                data: {
                    action: "autofill_checkout_fields_by_postcode",
                    postcode: postcode
                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {
                    console.log(response);
                    if (response){
                        data = JSON.parse(response);
                        provincia = data[0];
                        codigo = data[1];
                        localidades = "";
                        for (var i = 2; i < data.length; i++) {
                            localidades = localidades + '<option value="' + data[i] + '">' + data[i] + '</option>' 
                        }
   
					    $('#billing_state').replaceWith('<select name="billing_state" id="billing_state" class="state_select"><option value="' + codigo + '">' + provincia +'</option></select>');
                        $('#billing_state + .select2').remove();                
                        $('#billing_city').replaceWith('<select name="billing_city" id="billing_city" class="city_select">' + localidades + '</select>');
                        $('#billing_postcode').val(postcode);
						$(document.body).trigger("update_checkout");
                    } else {
                        console.log('ERROR');
                    }
                }
            })
        }
    });
    /*($('input#shipping_postcode').on('input', function () {
        var postcode = $(this).val();
        if (postcode.length == 4) {
            $('#shipping_city').css('opacity','.3');
            $('.state_select').css('opacity','.3');
            $('#shipping_state + .select2').css('opacity','.3');
            $.ajax({
                type: "post",
                url: base_url + '/wp-admin/admin-ajax.php',
                data: {
                    action: "autofill_checkout_fields_by_postcode",
                    postcode: postcode
                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {
                    console.log(response);
                    if (response){
                        data = JSON.parse(response);
                        provincia = data[0];
                        codigo = data[1];
                        localidades = "";
                        for (var i = 2; i < data.length; i++) {
                            localidades = localidades + '<option value="' + data[i] + '">' + data[i] + '</option>' 
                        }
                                                             
                        $('#shipping_state').replaceWith('<select name="shipping_state" id="shipping_state" class="state_select"><option value="' + codigo + '">' + provincia +'</option></select>');
                        $('#shipping_state + .select2').remove();

                        $('#shipping_city').replaceWith('<select name="shipping_city" id="shipping_city" class="city_select">' + localidades + '</select>');
                    } else {
                        console.log('ERROR');
                    }
                    

                    
                }
            })
        }
    });
    */

    setInputFilter(document.getElementById("temporary_postcode"), function(value) {
        return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    // Restricts input for the given textbox to the given inputFilter function.
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
            this.value = "";
            }
        });
        });
    }
      
    
});


