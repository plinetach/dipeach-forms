<?php

require_once 'core/init.php';
echo "hello123<br>";
$subm = new Submission();
if($subm->findSubmission(1)) {
    echo "<h2> OK! You did it!</h2>";
};
