var numberOfElements = 1;
var dateFormat = "mm/dd/yy",
from = $( "#startDate" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
    })
    .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
    }),
to = $( "#endDate" ).datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 3
})
    .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
    });


function getDate( element ) {
    var date;
    try {
        date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
        date = null;
    }

    return date;
}

function addField(){
    numberOfElements++;
    var suffix = numberOfElements.toString();
    var newDivId = 'choices' + suffix;
    var newSelectId = 's' + suffix;
    var newTitleId = 'title' + suffix;
    var newRequiredId= 'required' + suffix;
    var newRemoveButtonId = 'br' + suffix;

    $('#fields').append($("<div id='"+newDivId+"'></div>" ));
    $('#'+newDivId).append($("<label for='"+newSelectId+"'>Νέο Πεδίο&nbsp;</label>"));
    $('#'+newDivId).append($("<select id='"+newSelectId+"' name="+newSelectId+"></select>"));
    $('#'+newSelectId).append($("<option value='1'>Πεδίο Κειμένου</option><option value='2'>Πεδίο NAI/OXI</option>"));
    $('#'+newDivId).append($("<input type='text' placeholder='Τίτλος Πεδίου' required name='"+newTitleId+"' id='"+newTitleId+"'>"));
    $('#'+newDivId).append($("<input type=checkbox checked name='"+newRequiredId+"' id='"+newRequiredId+"'>"));
    $('#'+newDivId).append($("<label for='"+newRequiredId+"'>Απαιτείται</label>"));
    $('#'+newDivId).append($("<button id='"+newRemoveButtonId+"' type='button' onclick='removeField("+numberOfElements+")'>-</button>"));
    $('#'+newDivId).append($("<br><br>"));
    
}

function removeField(number){
    var suffix = number.toString();
    $('#choices'+ suffix).remove();    
}

// function checkDate(){
//     var startDate = $('#startDate').val();
//     var endDate = $('#endDate').val();
//     if(startDate && endDate){
//         if(startDate>endDate){
//             alert('wrong date');
//             $('#submit').prop('disabled', true);
//         }else{
//             $('#submit').prop('disabled', false);   
//         }
//     }
// }