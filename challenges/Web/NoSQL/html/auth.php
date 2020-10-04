<?php

if (isset($_GET['view_source'])) {
    highlight_file(__FILE__);
    die();
}
include_once 'config.php';

session_start();

function get_absolute_path($path)
{
    $unix = substr($path, 0, 1) === '/';

    $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
    $absolutes = array();
    foreach ($parts as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) {
            array_pop($absolutes);
        } else {
            $absolutes[] = $part;
        }
    }

    $final_path = implode(DIRECTORY_SEPARATOR, $absolutes);
    if ($unix) {
        $final_path = '/' . $final_path;
    }

    return $final_path;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_GET['action'] == 'register' && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password']) && !empty($_POST['confirm-password']) && !empty(trim($_POST['username']))) {
        $username = trim($_POST['username']);
        $username = str_replace(array('../', '..\\'), '', $username); // ^_^

        $password = $_POST['password'];
        $user_dirs = glob(getcwd() . '/users/*');
        foreach ($user_dirs as $user_dir) {
            $user_dir_name = basename($user_dir);
            if ($user_dir_name == $username) {
                $error = 'The username already exists!';
                break;
            }
        }

        if (!isset($error)) {
            $user_dir = get_absolute_path(getcwd() . '/users/' . $username);
            $base_dir = get_absolute_path(getcwd() . '/users');
            if (strpos($user_dir, $base_dir) === false) {  // \~(*o*)~/
                $error = 'Invalid username!';
            } else {
                if (!isset($error)) {
                    if (!file_exists($user_dir) && !mkdir($user_dir, 0755, true)) {
                        $error = 'Cannot create directory!';
                    } else {
                        $password_file = $user_dir . '/' . PASSWORD_FILENAME;
                        if (file_put_contents($password_file, md5($password)) !== false) {

                            $_SESSION['username'] = $username;

                            header("Location: index.php");
                            exit();
                        } else {
                            $error = 'Cannot write file!';
                        }
                    }
                }
            }
        }

    } else if ($_GET['action'] == 'login' && isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_dir = get_absolute_path(getcwd() . '/users/' . $username);
        if (strpos($user_dir, getcwd()) == -1) {
            $errror = 'Invalid username';
        }

        if (!isset($error)) {
            $password_file = $user_dir . '/' . PASSWORD_FILENAME;
            if (file_exists($password_file)) {
                $password_md5 = file_get_contents($password_file);
                if (md5($password) == $password_md5) {
                    if ($username == 'admin') {
                        $new_password = md5($password . SECRET);
                        file_put_contents($password_file, $new_password);
                    }

                    $_SESSION['username'] = $username;

                    header('Location: index.php');
                    die();
                } else {
                    $error = 'Invalid Credentials!';
                }
            } else {
                $error = 'Invalid Credentials!';
            }
        }
    }
} else {
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        unset($_SESSION['username']);

        header('Location: auth.php');
        die();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="auth.php?action=login" method="post" role="form"
                                  style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Password">
                                </div>

                                <?php if (isset($error)) echo $error ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
								<!--DEBUG: ?view_source -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="" tabindex="5"
                                                   class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="register-form" action="auth.php?action=register" method="post"
                                  role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                                           placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2"
                                           class="form-control" placeholder="Confirm Password">
                                </div>
                                <?php if (isset($error)) echo $error ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit"
                                                   tabindex="4" class="form-control btn btn-register"
                                                   value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {

        $('#login-form-link').click(function (e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function (e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });
</script>
</body>
</html>
