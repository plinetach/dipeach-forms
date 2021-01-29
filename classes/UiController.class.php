<?php
class UiController{
    private $_db;
    
    function __construct(){
        $this->_db = Dbh::getInstance();
    }
    
    function showHeader(){?>
        <!DOCTYPE html>
        <html>
        <head>
        <title> Υποβολή Στοιχείων </title>
        <style>
            body{
                text-align:center; 
            }
            
            form{
                text-align:left;
                margin-top:100px;
                display: inline-block;
            }
        </style>
        <script type="text/javascript">
            /* VALIDATION EXAMPLE. WE DOESN'T NEED RIGHT NOW BECAUSE numberofkids IS REQUIRED
            function checkinput(){
                ob_2_ch = document.getElementById("numberofkids");
                //console.log(ob_2_ch.value);

                if(ob_2_ch.value==""){
                    console.log("if")
                    ob_2_ch.style.border ="3px solid red";
                }
                else{
                    console.log("else")
                    window.location.href = "localhost/save-to-db.php";
                }
            }
            */
        </script>
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

    function showReport(){?>

    <?php }

    function showFooter(){?>
        </body>
        </html>
    <?php }
}


