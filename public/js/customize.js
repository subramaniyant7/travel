$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#reg_form").on("click",function(e){
    e.preventDefault();
    let formData = {};
    $.each($('#register_form').serializeArray(), function(i, field) {
        formData[field.name] = field.value;
    });
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let noError = true;
    if(formData.user_fname == '') { noError= false; notify('Please Enter First Name'); }
    if(formData.user_lname == '') { noError= false; notify('Please Enter Last Name'); }
    if($('#email_validate').val() == 1) { noError= false; notify('Email Id Already Exist'); }
    if(formData.user_email == '') { noError= false; notify('Please Enter Email'); }
    if(formData.user_email != '' && !regex.test(formData.user_email)){ notify('Please Enter Valid Email Address '); noError= false;  }
    if(formData.user_password == ''){ noError= false; notify('Please Enter Password'); }
    if(formData.user_phone == '') { noError= false; notify('Please Enter PhoneNumber'); }
    if(formData.user_phone.length != 10) { noError= false; notify('Please Enter ValidPhoneNumber'); }
    if(formData.user_country == ''){ noError= false; notify('Please Select Country'); }
    if(formData.user_state == ''){ noError= false; notify('Please Select State'); }
    if(formData.user_city == ''){ noError= false; notify('Please Select City'); }
    if(formData.user_zipcode == '') { noError= false; notify('Please Enter Zip Code'); }
    if(formData.user_zipcode !='' && formData.user_zipcode.length != 6) { noError= false; notify('Please Enter Valid Zip Code'); }
    if(noError) $('#register_form').submit();
});

$("#flight_search").on("click",function(e){
    e.preventDefault();
    let formData = {};
    $.each($('#flight_search_form').serializeArray(), function(i, field) {
        formData[field.name] = field.value;
    });
    let noError = true;
    if(formData.from == '') { noError= false; notify('Please Select Start Point'); }
    if(formData.to == '') { noError= false; notify('Please Select End Point'); }
    if(formData.depart == '') { noError= false; notify('Please Enter Depart Date'); }
    if(formData.adults == '') { noError= false; notify('Please Enter Adults details'); }
    if(noError) $('#flight_search_form').submit();
});

$('#flight_booking').on('click',function(e){
    e.preventDefault();
    let noError = true;
    // let adult = $('input[name=flight_adult]').val();
    // if(adult =='' || adult < 0){
    //     notify('Please Enter Adult Details');
    // }
    let total = $("#passenger_table tbody").find('tr').length;
    let adult = kids= infant = 0;

    $("#passenger_table tbody").find('tr').each(function(){
        if($(this).find('#p_name').val()==''){ noError = false; }
        if($(this).find('#p_age').val()==''){ noError = false; }
        if($(this).find('select[name=p_sex]').val()==''){ noError = false; }
        if($(this).find('select[name=p_type]').val()==''){ noError = false; }
        if($(this).find('select[name=p_type]').val()=='A'){ adult++; }
        if($(this).find('select[name=p_type]').val()=='K'){ kids++; }
        if($(this).find('select[name=p_type]').val()=='I'){ infant++; }
    });
    if(noError) {
        $('input[name=load_flight_adult_qty]').val(adult);
        $('input[name=load_flight_kids_qty]').val(kids);
        $('input[name=load_flight_infants_qty]').val(infant);
        $('#booking_form').submit();
    }
    else notify('Please enter passenger details');

    // document.querySelector("body").style.visibility = "hidden";
    // $("#loader").show();

});

const quotePriceUpdate = () => {
    let adult = $('input[name=flight_adult]').val();
    let kids = $('input[name=flight_kids]').val();
    let infant = $('input[name=flight_infants]').val();
    let loadAdult = $('input[name=load_flight_adult_price]').val();
    let loadKids = $('input[name=load_flight_kids_price]').val();
    let loadInfant = $('input[name=load_flight_infant_price]').val();
    let kidsPrice = infantPrice = totalPrice = adultPrice =  0;

    if(adult !='' && adult >0){
        $('#flight_booking').prop('disabled',false);
        adultPrice = adult * loadAdult;
        $('.adult_price').show().find('span').eq(1).html(adult+'x'+loadAdult);
        if(kids > 0 ) {
            kidsPrice = kids * loadKids ;
            $('.kids_price').show().find('span').eq(1).html(kids+'x'+loadKids);
            $('input[name=load_flight_kids]').val(kidsPrice);
        }
        if(infant > 0 ) {
            infantPrice = infant * loadInfant ;
            $('.infant_price').show().find('span').eq(1).html(infant+'x'+loadInfant);
            $('input[name=load_flight_infants]').val(infantPrice);
        }
        totalPrice = parseInt(adultPrice) + parseInt(kidsPrice) + parseInt(infantPrice);
        $('.total_price').find('span').eq(1).html('$'+totalPrice);

        $('input[name=load_flight_adult]').val(adultPrice);
        $('input[name=load_price]').val(totalPrice);
    }else{
        notify('Please Enter Adult Details');
        $('#flight_booking').prop('disabled',true);
    }
}


$('.addpassenger').on('click',function(){
    let html = '<tr><th><input id="name" class="input" name="p_name" type="text" /></th><td><input id="age" class="input" name="p_age" type="text" /></td>';
    html += '<td><select name="p_sex"><option value="">select</option><option value="1" >Male</option><option value="2" >Female</option><option value="3" >Other</option></select></td>';
    html += '<td><select name="p_type"><option value="A" selected >Adult</option><option value="K" >Kids</option><option value="I">Infant</option></select></td>';
    html += '<td class="remove"> x </td></tr>'
    $('#passenger_table > tbody:last-child').append(html);
});

$(document).on("click",".remove",function() {
    let row = $('#passenger_table >tbody >tr').length;
    if(row > 1) {
        $(this).closest('tr').remove();
        $('.kids_price').hide();
        $('.infant_price').hide();
        let adultCount = kidsCount = infantCount = 0;
        let kidsPrice = infantPrice = totalPrice = adultPrice =  0;
        $("#passenger_table tbody").find('tr').each(function(){
            if($(this).find('select[name=p_type]').val()=='A'){ adultCount++; }
            if($(this).find('select[name=p_type]').val()=='K'){ kidsCount++; }
            if($(this).find('select[name=p_type]').val()=='I'){ infantCount++; }
        });
        let actualAdultPrice = $('input[name=load_flight_adult_price]').val();
        let actulaKidsPrice = $('input[name=load_flight_kids_price]').val();
        let actulaInfantPrice = $('input[name=load_flight_infant_price]').val();
        $('.adult_price').show().find('span').eq(1).html(adultCount+'x'+actualAdultPrice);
        adultPrice = adultCount * actualAdultPrice ;
        $('input[name=load_flight_adult_qty]').val(adultCount);
        if(kidsCount > 0 ) {
            kidsPrice = kidsCount * actulaKidsPrice ;
            $('.kids_price').show().find('span').eq(1).html(kidsCount+'x'+actulaKidsPrice);
            $('input[name=load_flight_kids_qty]').val(kidsCount);
        }
        if(infantCount > 0 ) {
            infantPrice = infantCount * actulaInfantPrice ;
            $('.infant_price').show().find('span').eq(1).html(infantCount+'x'+actulaInfantPrice);
            $('input[name=load_flight_infants_qty]').val(infantCount);
        }
        totalPrice = parseInt(adultPrice) + parseInt(kidsPrice) + parseInt(infantPrice);
        $('.total_price').find('span').eq(1).html('$'+totalPrice);

        $('input[name=load_price]').val(totalPrice);
    }
    else notify('Atleast one passenger needed');


});

const emailValidate = (email) => {
    $.post("/email_validate", { 'email' : email } ,function(res, status){
        $('#reg_form').prop('disabled', false);
        $('#email_validate').val(2);
        if(res.status){
            notify(res.msg);
            $('#reg_form').prop('disabled', true);
            $('#email_validate').val(1);
        }
    });
}

const getState = (val) =>{
    $.post("/load_state", { 'id' : val } ,function(res, status){
        if(res.status){
            let attr = 'select[name=user_state]';
            $(attr).prop("disabled", false).html('').append($("<option></option>").attr("value", '').text('Select'));
            $.each(res.data, function(key, value){
                $(attr).append($("<option></option>").attr("value", value.state_id).text(value.state_name));
            });
        }else{
            notify(res.msg);
        }
    });
}

const getCity = (val) =>{
    $.post("/load_city", { 'id' : val } ,function(res, status){
        let attr = 'select[name=user_city]';
        $(attr).prop("disabled", false).html('').append($("<option></option>").attr("value", '').text('Select'));
        if(res.status){
            $.each(res.data, function(key, value){
                $(attr).append($("<option></option>").attr("value", value.city_id).text(value.city_name));
            });
        }else{
            notify(res.msg);
        }
    });
}

const notify = (msg) => { $.toast().reset('all'); $.toast({ text: msg, position: 'top-right', icon: 'error',
showHideTransition: 'slide',  hideAfter: 8000,  stack: 20, loader: !1, }); }

document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#loader").style.visibility = "visible";
    } else {
        document.querySelector("#loader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
    }
};
