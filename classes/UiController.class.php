<?php
class UiController{
    private $_db;
    
    public function __construct(){
        echo "<strong>Creating UI...</strong><br><br>";
        $this->_db = Dbh::getInstance();
    }

    private function showUserHeader($title, $linkToCss=''){?>
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
        <title> <?php echo $title?> </title>
        
        <link rel="stylesheet" href="<?php echo 'style/'.$linkToCss?>">

        </head>
        <body>
    <?php }

    private function showAdminHeader($title, $linkToCss=''){?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title> <?php echo $title?> </title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo 'style/'.$linkToCss?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
<?php }

    function showLoginForm(){?>

    <?php }

    private function openSubmissionForm(){?>
        <form method="post">
    <?php }

    private function showAdminSubmissionDynaForm(){?>
        <form class = "form" action="createForm.php" style="display: block;" method="post">
            <div id="fields" class="fields">
                <div id="choices1">
                    <label for="s1">1ο Πεδίο</label>
                    <select id = "s1" name="s1">
                        <option value="1">Πεδίο Κειμένου</option>
                        <option value="2">Πεδίο NAI/OXI</option>
                    </select>
                    <input type="text" id="title1" name="title1" required placeholder="Τίτλος πεδίου">
                    <input type="checkbox" id="required1" name="required1" checked>
                    <label for="required1">Απαιτείται</label>
                    <br><br>
                </div>
            </div>
            <button id="bn1" type="button" onclick="addField()">+</button>
            <br><br>
            
            <div class='dates'>
                <label for="from">From</label>
                <input type="text" id="startDate" name="startDate" autocomplete="off" required>
                <label for="to">to</label>
                <input type="text" id="endDate" name="endDate" autocomplete="off" required>
            </div>
            <br><br>
            <button id="submit" type="submit">Υποβολή</button>
        </form>
    <?php
    }

    private function showElement($id, $type, $required, $text){?>
        <label for="<?php echo $id?>"><?php echo $text ?></label>
        <input type="<?php echo $type?>" id="<?php echo $id?>" name="<?php echo $id?>" <?php echo $required?> placeholder="<?php echo $text?>">
        <br><br>
    <?php
    }

    private function closeSubmissionForm(){?>
        <button type="submit">Υποβολή</button>
        </form> 
    <?php
    }

    function showReport(){?>

    <?php }

    public function showFormCreationPage($user){
        $this->showAdminHeader("Διαχειριστής:Δημιουργία Φόρμας από $user", "createDynaForm.css");
        $this->showAdminSubmissionDynaForm();
        $this->showAdminFooter("createDynaForm.js");
    }

    private function showAdminFooter($linkToScript=''){?>
        <script src='<?php echo "javascript/".$linkToScript?>'></script> 
    </body>
    </html>
    <?php }
    
    private function showUserFooter($linkToScript=''){?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src='<?php echo "javascript/".$linkToScript?>'></script> 
    </body>
    </html>
    <?php }

    public function showUserSubmissionPage($user, $elements){       
        $this->showUserHeader("Υποβολή Χρήστη $user");
        $this->openSubmissionForm();
        $i=0;
        foreach($elements as $element){            
            $title = $element[1];            
            $type = $this->getTyp($element[0]); 
            $required= $this->getReq($element[2]);           
            $id="el".$i;
            $this->showElement($id, $type, $required, $title);

            $i++;
        }
        $this->closeSubmissionForm();
        $this->showUserFooter();
    }

    public function showAvailableForms($forms, $user){
        $this->showUserHeader("Διαθέσιμες υποβολές για τον χρήστη $user");
        $this->openSubmissionForm();
        ?>
        <label for="avforms">Επιλέξτε υποβολή</label>
        <select name="avforms" id="avforms">
        <?php
        $i=0;
        foreach($forms as $form){
            ?>
            <option value="<?php echo $form?>"><?php echo $form?></option>
            <?php
            $i++;
        }
        ?>
        </select>
        <?php
        $this->closeSubmissionForm();
        $this->showUserFooter();
    }

    private function getReq($cell){
        if($cell=="on"){
            return "required";
        }
        return null;
    }
    
    private function getTyp($cell){
        if($cell=='1'){
            return 'text';
        }else if($cell=='2'){
            return "checkbox";
        }
    }
}


