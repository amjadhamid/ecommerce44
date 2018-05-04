<?php
// CAtegories =>[ Manage | Edit |Update |Add | Insert | Delete  | Stats]

$do =isset($_GET['do']) ? $_GET['do'] : 'Manage';



if ($do == 'Manage'){
    echo 'Welcome You are in manage categor page';
    echo '<a href="?do=Inert";>Add New Category + <a> ';
} elseif ($do = 'Add') {
    echo 'Welcome You are in Add categor page';
    
}elseif ($do = 'Insert') {
    echo 'Welcome You are in Insert categor page';
    
}else{
    echo 'Error Tere are no Page with this name ';
    
}
