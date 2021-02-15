<?php
class UiController{
    private $_db;
    
    function __construct(){
        echo "<strong>Creating UI...</strong><br><br>";
        $this->_db = Dbh::getInstance();
    }

    function showHeader($title, $linkToCss=''){?>
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

    function openSubmissionForm($fileName){?>
        <form method="post" action="<?php echo $fileName?>">
    <?php }

    function showAdminSubmissionDynaForm(){?>
        <form class = "form" action="createForm.php" style="display: block;" method="post">
            <div id="fields" class="fields">
                <div id="choices1">
                    <label for="s1">1ο Πεδίο</label>
                    <select  id = "s1" name="s1">
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <input type="text" id="title1" name="title1" required placeholder="Τίτλος πεδίου">
                    <input type="checkbox" id="required1" name="required1" checked>
                    <label for="required1">Απαιτείται</label>
                    <br>
                    <button id="bn1" type="button" onclick="addField()">+</button>
                    <br><br>
                </div>
            </div>
            
            <div class='dates'>
                <label for="startDate">Start Date</label>
                <input type="date" name="startDate" id="startDate"  required onchange="checkDate()">
                <label for="endDate">End Date</label>
                <input type="date" name="endDate" id="endDate"  required onchange="checkDate()" >  
            </div>
            <br><br>
            <button id="submit" type="submit">Υποβολή</button>
        </form>
    <?php
    }

    function showElement($id, $type, $required, $text){?>
        <label for="<?php echo $id?>"><?php echo $text ?></label>
        <input type="<?php echo $type?>" id="<?php echo $id?>" name="<?php echo $id?>" required="<?php echo $required?>" placeholder="<?php echo $text?>">
        <br><br>
    <?php
    }

    function closeSubmissionForm(){?>
        <button type="submit">Υποβολή</button>
        </form> 
    <?php
    }

    function showReport(){?>

    <?php }

    function showFooter($linkToScript=''){?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src='<?php echo "javascript/".$linkToScript?>'></script> 
    </body>
    </html>
    <?php }
}


