var numberOfElements = 1;

function addField(){
    var oldNumberOfElements = numberOfElements;
    numberOfElements++;
    var suffix = numberOfElements.toString();
    var newDivId = 'choices' + suffix;
    var newLabelText = suffix + 'ο Πεδίο';
    var newSelectId = 's' + suffix;
    var newSelectName = 's' + suffix;
    var newNewButtonId = 'bn' + suffix;
    var newRemoveButtonId = 'br' + suffix;

    $('#fields').append($("<div id='"+newDivId+"'></div>" ));
    $('#'+newDivId).append($("<label for='"+newSelectId+"'>"+newLabelText+"&nbsp;</label>"));
    $('#'+newDivId).append($("<select id='"+newSelectId+"' name="+newSelectName+"></select>"));
    $('#'+newSelectId).append($("<option value='1'>Πεδίο Κειμένου</option><option value='2'>Πεδίο NAI/OXI</option>"));
    $('#'+newDivId).append($("<button id='"+newNewButtonId+"' type='button' onclick='addField()'>+</button>"));
    $('#'+newDivId).append($("<button id='"+newRemoveButtonId+"' type='button' onclick='removeField()'>-</button>"));
    $('#'+newDivId).append($("<br><br>"));
    $('#bn'+oldNumberOfElements.toString()).css("display", "none");
    $('#br'+oldNumberOfElements.toString()).css("display", "none");
    // console.log(numberOfElements);
}

function removeField(){
    var suffix = numberOfElements.toString();
    $('#choices'+ suffix).remove();
    numberOfElements--;
    $('#bn'+numberOfElements.toString()).css("display", "inline");
    $('#br'+numberOfElements.toString()).css("display", "inline");
    // console.log(numberOfElements);
}