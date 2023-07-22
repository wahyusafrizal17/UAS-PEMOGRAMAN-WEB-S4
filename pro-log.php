<?php

session_start();

$list_users = [
    [
        'email' => 'wahyusafrizal174@gmail.com',
        'password' => '123456'
    ]
];


$not_found = false;
foreach ($list_users as $key => $user) {
    if ($user['email'] == $_REQUEST['email']) {
        if ($user['password'] == $_REQUEST['password']) {
            if(isset($_REQUEST['remember'])){
                setcookie('status_login', 'true', time() + 60);
                setcookie('key', $_REQUEST['email'], time() + 60);
            }
            
            $_SESSION['email'] = $_REQUEST['email'];
            $_SESSION['status_login'] = true;
            $_SESSION['message'] = "Berhasil Login";
            header("Location: index.php");
        } else {
            $_SESSION['error'] = 'Password salah';
            $not_found = true;
        }        
    } else {
        $_SESSION['error'] = 'Email tidak terdaftar';
        $not_found = true;
    }
    
}

if ($not_found == true) {
    header("Location: login.php");
}

?>