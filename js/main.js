// scroll up functionality
var scrollBtn = $('#scrollup');

$(window).scroll(function() {

  if(($(window).width() >= 992 && $(window).scrollTop() > 10)){
    $(".navbar-custom").css('opacity','0.8')
  }else if(($(window).width() >= 992 && $(window).scrollTop() < 10)){
    $(".navbar-custom").removeAttr('style');
  }

  ($(window).scrollTop() > 300)?
    scrollBtn.addClass('show')
  :
    scrollBtn.removeClass('show');
});

scrollBtn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
// remove message when new form submission initiated
$("input, textarea").on('click',function(){
    ($( "#formMsg .alert-success" ).length !== 0)&& $(".alert-success").remove();
  });

$("#submit").on('click', function(event) {

    var data = {
        firstName: $('#firstName').val(),
        lastName: $('#lastName').val(),
        email: $('#email').val(),
        phoneNumber: $('#phoneNumber').val(),
        city: $('#city').val(),
        postalCode: $('#postalCode').val(),   
        unitSize: $('#unitSize').val(),
        contactSource: $('#contactSource').val(),
        priceRange: $('#priceRange').val(),
        isBroker: $("input[name='isBroker']:checked").val(),
        antiSpamCheck: $("input[name='antiSpamCheck']").is(":checked"),
        action: "save"
    }
    const validateResult = validateForm(data);
    if(validateResult === 0){
        $("#submit").attr("disabled", true);
        $("#submit").html("Saving...");
        $.post("/ImpactNorth/request.php", data, function(result){
            if(result === "0") {
                validateForm(data);
            }else{
                resetForm();
                $("#formMsg").prepend(`<div class="alert alert-success">${result}</div>`);
                $("#submit").removeAttr("disabled");
                $("#submit").html("Submit");
                $("#firstName").focus();
            }
        });
    }
}); 
function resetForm(){

    ($( "#formMsg .alert-danger" ).length !== 0)&& $(".alert-danger").remove();
    ($( "#formMsg .alert-success" ).length !== 0)&& $(".alert-success").remove();
    $('#firstName').val("");
    $('#lastName').val("");
    $('#email').val("");
    $('#phoneNumber').val("");
    $('#city').val("");
    $('#postalCode').val("");
    $('#unitSize').val("");
    $('#contactSource').val("");
    $('#priceRange').val("");
    $('input[name="isBroker"]:checked').prop( "checked", false );
    $('input[name="antiSpamCheck"]:checked').prop( "checked", false );
    
}
function validateForm(data){

    var result = [];
    emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    mobileRegex = /^\(?([0-9]{3})\)[-.]([0-9]{3})[-.]([0-9]{4})$/i;
    postalCodeRegex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    digitRegex = /^[0-9]*$/;

    if(data.firstName == ""){
        result.push({firstName:"First name is required"});
    }
    if(data.lastName == ""){
        result.push({lastName:"Last name is required"});
    }
    if(data.email == ""){
        result.push({email:"Email is required"});
    }else if(!emailRegex.test(data.email)){
        result.push({email:"Invalid email format"})
    }
    if(data.phoneNumber == ""){
        result.push({phoneNumber:"Phone number is required"});
    }else if(!mobileRegex.test(data.phoneNumber)){
        result.push({phoneNumber:"Only accepts (999)-999-9999 format"})
    }
    if(data.city == ""){
        result.push({city:"City is required"});
    }
    if(data.postalCode == ""){
        result.push({postalCode:"Postal Code is required"});
    }else if(!postalCodeRegex.test(data.postalCode)){
        result.push({postalCode:"Invalid format e.g A1A 1A1 or A1A1A1"});
    }
    if(data.unitSize == ""){
        result.push({unitSize:"Unit size is required"});
    }else if(!digitRegex.test(data.unitSize)){
        result.push({unitSize:"Unit size: only numbers allowed"})
    }
    if(data.contactSource == ""){
        result.push({contactSource:"How did you hear about us? is required"});
    }
    if(data.priceRange == ""){
        result.push({priceRange:"Price range is required"});
    }else if(!digitRegex.test(data.priceRange)){
        result.push({priceRange:"Price range: only numbers allowed"})
    }
    if(data.isBroker === undefined){
        result.push({isBroker:"Are you broker? is required"});
    }
    if(data.antiSpamCheck === false){
        result.push({antiSpamCheck:"Your consent is required"});
    }
    ($( "#formMsg .alert-danger" ).length !== 0)&& $(".alert-danger").remove();
    ($( "#formMsg .alert-success" ).length !== 0)&& $(".alert-success").remove();
    $('.custom-form').removeClass('is-invalid');
    $('.custom-form').removeClass('text-danger');
    $(".broker-radio-wrapper").removeClass('broker-invalid');

    (result.length !== 0)&& $("#formMsg").prepend(`<div class="alert alert-danger">${result.map((item, i) => { 
        $('#'+Object.keys(item)[0]+'Label').addClass('text-danger');
        (Object.keys(item)[0]) === "isBroker" ? $(".broker-radio-wrapper").addClass('broker-invalid') : $('#'+Object.keys(item)[0]).addClass('is-invalid');
        return i+1+". "+Object.values(item)[0]+"<br/>"; 
    }).join('')}</div>`);
    return result.length
}