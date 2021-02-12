var numberOfElements = 1;

function addField(){
    numberOfElements++;
    suffix = numberOfElements.toString();
    newDivId = 'choices' + suffix;
    newLabelText = suffix + 'ο Πεδίο';
    newSelectId = 's' + suffix;
    newSelectName = 's' + suffix;
    newNewButtonId = 'bn' + suffix;
    newRemoveButtonId = 'br' + suffix;

    $('#fields').append($("<br><div id='"+newDivId+"'></div>" ));
    $('#'+newDivId).append($("<label for='"+newSelectId+"'>"+newLabelText+"&nbsp;</label>"));
    $('#'+newDivId).append($("<select id='"+newSelectId+"' name="+newSelectName+"></select>"));
    $('#'+newSelectId).append($("<option value='1'>Πεδίο Κειμένου</option><option value='2'>Πεδίο NAI/OXI</option>"));
    $('#'+newDivId).append($("<button id='"+newNewButtonId+"' type='button' onclick='addField()'>+</button>"));
    $('#'+newDivId).append($("<button id='"+newRemoveButtonId+"' type='button' onclick='removeField()'>-</button>"));

    console.log(numberOfElements);
}

function removeField(){
   $('#choices'+ suffix).remove();
   numberOfElements--;
   console.log(numberOfElements);
}