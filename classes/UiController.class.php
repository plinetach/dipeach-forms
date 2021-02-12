<?php
class UiController{
    private $_db;
    
    function __construct(){
        echo "Creating UI...";
        //$this->_db = Dbh::getInstance();
    }

    function showHeader($title, $linkToCss){?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
        <title> <?php echo $title?> </title>
        <link rel="stylesheet" href="<?php echo 'style/'.$linkToCss?>">

        </head>
        <body>
    <?php }

    function showLoginForm(){?>
        <form id="fsubmit" method="post" action="">
            <h2> Συμπληρώστε τα παρακάτω πεδία και πατήστε "Υποβολή"</h2><br>
            <label for="numberofkids">Αριθμός παιδιών: </label>
            <input type="text" name="numberofkids" id="numberofkids" placeholder="παράδειγμα: 2" value="" required>*<br><br>
            <input type="checkbox" id="iaccept">
            <label for="iaccept">Δέχομαι</label><br><br>
            <input type="submit" value="Υποβολή"><br><br>
            <label style="color:darkgreen">*Υποχρεωτικό πεδίο</label>
        </form>
    <?php }

    function showSubmissionForm(){?>

    <?php }

    function showAdminSubmissionForm(){?>
        <form class = "form" action="createForm.php" style="display: block;" method="post">
            <div class="fields">
                <div id="choices1">
                    <label for="s1">1ο Πεδίο</label>
                    <select  id = "s1" name="s1">
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn1" type="button" onclick="addField(2)">+</button>
                </div>
                <br>
                <div id="choices2">
                    <label for="s2">2ο Πεδίο</label>
                    <select  id = "s2" name="s2" onchange="workPlusButton(2)">
                        <option value="0" selected> 
                            Select an Option 
                        </option> 
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn2" type="button" onclick="addField(3)" style="display: none;">+</button>
                    <button id="br2" type="button" onclick="removeField(2)">-</button>
                </div>
                <br>
                <div id="choices3">
                    <label for="s3">3ο Πεδίο</label>
                    <select  id = "s3" name="s3" onchange="workPlusButton(3)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn3" type="button" onclick="addField(4)" style="display: none;">+</button>
                    <button id="br3" type="button" onclick="removeField(3)">-</button>
                </div>
                <br>
                <div id="choices4">
                    <label for="s4">4ο Πεδίο</label>
                    <select  id = "s4" name="s4" onchange="workPlusButton(4)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn4" type="button" onclick="addField(5)" style="display: none;">+</button>
                    <button id="br4" type="button" onclick="removeField(4)">-</button>
                </div>
                <br>
                <div id="choices5">
                    <label for="s5">5ο Πεδίο</label>
                    <select  id = "s5" name="s5" onchange="workPlusButton(5)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn5" type="button" onclick="addField(6)" style="display: none;">+</button>
                    <button id="br5" type="button" onclick="removeField(5)">-</button>
                </div>
                <br>
                <div id="choices6">
                    <label for="s6">6ο Πεδίο</label>
                    <select  id = "s6" name="s6" onchange="workPlusButton(6)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn6" type="button" onclick="addField(7)" style="display: none;">+</button>
                    <button id="br6" type="button" onclick="removeField(6)">-</button>
                </div>
                <br>
                <div id="choices7">
                    <label for="s7">7ο Πεδίο</label>
                    <select  id = "s7" name="s7" onchange="workPlusButton(7)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn7" type="button" onclick="addField(8)" style="display: none;">+</button>
                    <button id="br7" type="button" onclick="removeField(7)">-</button>
                </div>
                <br>
                <div id="choices8">
                    <label for="s8">8ο Πεδίο</label>
                    <select  id = "s8" name="s8" onchange="workPlusButton(8)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn8" type="button" onclick="addField(9)" style="display: none;">+</button>
                    <button id="br8" type="button" onclick="removeField(8)">-</button>
                </div>
                <br>
                <div id="choices9">
                    <label for="s9">9ο Πεδίο</label>
                    <select  id = "s9" name="s9" onchange="workPlusButton(9)">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn9" type="button" onclick="addField(10)" style="display: none;">+</button>
                    <button id="br9" type="button" onclick="removeField(9)">-</button>
                </div>
                <br>
                <div id="choices10">
                    <label for="s10">10ο Πεδίο</label>
                    <select  id = "s10" name="s10">
                        <option value="0" selected> 
                            Select an Option 
                        </option>
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="br10" type="button" onclick="removeField(10)">-</button>
                </div>
                <br>
            </div>
            <div class='dates'>
                <label for="startDate">Start Date</label>
                <input type="date" name="startDate" id="startDate" required>
                <label for="endDate">End Date</label>
                <input type="date" name="endDate" id="endDate" required >  
            </div>
            <button type="submit">Υποβολή</button>
        </form>
        <label name="errorLabel" class="error"></label>
        
    <?php
    }

    function showAdminSubmissionDynaForm(){?>
        <form class = "form" action="createForm.php" style="display: block;" method="post">
            <div id="fields" class="fields">
                <div id="choices1">
                    <label for="s1">1ο Πεδίο</label>
                    <select  id = "s1" name="s1">
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <button id="bn1" type="button" onclick="addField()">+</button>
                </div>
            </div>
            <br><br>
            <div class='dates'>
                <label for="startDate">Start Date</label>
                <input type="date" name="startDate" id="startDate" required>
                <label for="endDate">End Date</label>
                <input type="date" name="endDate" id="endDate" required >  
            </div>
            <button type="submit">Υποβολή</button>
        </form>
    <?php
    }

    function showReport(){?>

    <?php }

    function showFooter($linkToScript){?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src='<?php echo "javascript/".$linkToScript?>'></script> 
    </body>
    </html>
    <?php }
}


