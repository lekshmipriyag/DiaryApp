
$(document).ready(function () {
    "use strict";
    $('#editAddress').hide();
    $('#viewFeedback').hide();
});

$('#editDeliverAddress').click(function () {
    "use strict";
    $('#editAddress').show();
    $('#addressForDelivery').hide();
});

$('#returnToMainAddress').click(function () {
    "use strict";
    $('#editAddress').hide();
    $('#addressForDelivery').show();
});

$('#txtdeliverOPt').change(function () {
    "use strict";
    
    var selectedVal = $("#txtdeliverOPt option:selected").val();
    //var totPrice = $('#totPrice').val();
    //alert(totPrice);
    var price = 50;
    if(selectedVal == "Express"){
        price = 100;
    }
    
    var totPrice = parseFloat($('#totPrice').val());
    var calcPrice = parseFloat(price);
    var grandTotal = totPrice + calcPrice;
    

    $("#deliveryType").html(selectedVal);
    $("#deliveryCharge").html(price);
    $("#grandTotal").html(grandTotal.toFixed(2));
    $("#grandTotalHidden").val(grandTotal.toFixed(2));
    
});


$('#editAddress #txtdeliverOPt').change(function () {
    "use strict";
    
    var selectedVal = $("#editAddress #txtdeliverOPt option:selected").val();
    //var totPrice = $('#totPrice').val();
    //alert(totPrice);
    var price = 50;
    if(selectedVal == "Express"){
        price = 100;
    }
    
    var totPrice = parseFloat($('#totPrice').val());
    var calcPrice = parseFloat(price);
    var grandTotal = totPrice + calcPrice;
    

    $("#deliveryType").html(selectedVal);
    $("#deliveryCharge").html(price);
    $("#grandTotal").html(grandTotal.toFixed(2));
    $("#grandTotalHiddenEdit").val(grandTotal.toFixed(2));
    
});



$('#otherFeedbacks').click(function () {
    "use strict";
    $('#viewFeedback').show();
});