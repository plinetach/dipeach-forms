function addField(fieldNumber){
    $('#bn'+(fieldNumber-1).toString()).css('display', 'none');
    $("#choices"+fieldNumber.toString()).css('display', 'block');
    if(fieldNumber>2){
        $('#br'+(fieldNumber-1).toString()).css('display', 'none');
        //$('#s'+(fieldNumber-1).toString()+' option[value="0"]').hide();
    }  
}

function removeField(fieldNumber){
    $("#choices"+fieldNumber.toString()).css('display', 'none'); 
    $('#br'+(fieldNumber-1).toString()).css('display','inline')
    $('#bn'+(fieldNumber-1).toString()).css('display', 'inline');
    $('#s'+fieldNumber.toString()).val('0');
}

function workPlusButton(fieldNumber){
    if($('#s'+fieldNumber.toString()).val()=='0'){
        $('#bn'+fieldNumber.toString()).css('display', 'none');
    }else{
        $('#bn'+fieldNumber.toString()).css('display', 'inline');
    }
}