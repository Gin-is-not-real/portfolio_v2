<?php 
if(session_id() == '') {
    session_start();
}

$btn_connect = '<input class="round-btn super blue visible-on-home" id="btn-connection" type="submit" name="action" value="LOG IN">';
$btn_register = '<input class="round-btn super blue visible-on-home" id="btn-registration" type="submit" name="action" value="REGISTER">';
$btn_home = '<a href="index.php"><input class="round-btn super visible-on-app" id="btn-home" type="submit" name="action" value="HOME"></a>';
$btn_deconnect = '<a href="accounts_index.php?action=deconnection"><input class="round-btn super red visible-on-app" id="btn-deconnection" type="submit" name="action" value="LOG OUT"></a>';
$btns = array();
?>

<div id="main-login">
    <header>
        <div id="div-notice">
            <?php 
            if(isset($_GET['notice'])) {
    
            }
            else {
                if(!isset($_SESSION['pseudo'])) {
                    $_POST['log-notice'] = 'You must log in or register to access the application';
                    array_push($btns, $btn_connect, $btn_register);
                }
                else {
                    $_POST['notification'] = "you have been successfully logged in as <strong>" . $_SESSION['pseudo'] . "</strong>.";
                }
            }
    
            if(isset($_POST['log-notice'])) {
                 echo $_POST['log-notice'] . '</br>';
            }
    ?>
        </div>
    
        <div id="div-error">
            <?php
                if(isset($_POST['log-error'])) {
                    echo  $_POST['log-error'] .'</br>';
                }
            ?>
        </div>
    
        <div id="div-btns">
            <?php
                foreach($btns as $input) {
                    echo $input;
                }
            ?>
        </div>
    
        <div id="div-notif">
            <?php
                if(isset($_POST['notification'])) {
                    echo $_POST['notification'] .'</br>';
                }
                else {
                    echo 'you can also continue as a visitor and return to home ' .'</br>' .  $btn_home;
                }
            ?>
        </div>

<!-- LOGOUT -->
    <div id="div-logout">
        <div id="r-notice">
            <?php 
                if(isset($_SESSION['pseudo'])) {
                    echo "You are logged in as <strong>" . $_SESSION['pseudo'] . "</strong>";
                }
            ?>
        </div>
        <div>
            <?php 
                if(isset($_SESSION['pseudo'])) {
                    echo $btn_home . " " . $btn_deconnect;
                }
            ?>
        </div>
    </div>
</header>


<div id="main-accounts">
<!-- CONNECTION -->
    <section id="sec-connection" class="centred-section accounts">
        <header>
            <h3>CONNECTION</h3>
        </header>

        <form class="form-accounts" action="accounts_index.php?action=connection" method="post">
                <table class="table-form-accounts">
                    <tr>
                        <th>Pseudo</th>
                        <th>Password</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form_textfield" name="pseudo" required autocomplete="off">
                        </td>
                        <td>
                            <input type="password" class="form_textfield" name="pass" required autocomplete="off">
                        </td>
                    </tr>
                </table>
                <input class="round-btn super green" type="submit" value="LOG IN">
            </div>
        </form>
    </section>

<!-- REGISTRATION -->
    <section id="sec-registration" class="centred-section accounts">
        <header>
            <h3>REGISTRATION</h3>
        </header>

        <form class="form-accounts" id="form-registration" action="accounts_index.php?action=registration" method="post">
        <section>

            <table class="table-form-accounts">
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="form_textfield" name="reg_pseudo" value="gin" autocomplete="off" required >
                    </td>
                    <td>
                        <input type="email" class="form_textfield" name="reg_mail" value="gin@fake.fr" autocomplete="off" required >
                    </td>
                </tr>
            </table>
            <table class="table-form-registration">
                <tr>
                    <th>Password</th>
                    <th>Repeat password</th>
                </tr>
                <tr>
                    <td>
                        <input type="password" class="form_textfield" name="reg_pass" value="fake" autocomplete="off" required >
                    </td>
                    <td>
                        <input type="password" class="form_textfield" name="reg_pass_repeat" value="fake" autocomplete="off" required >
                    </td>
                </tr>
            </table>
        </section>
            <div>
                <input class="round-btn super green" type="submit" value="REGISTER" >
            </div>
        </form>
    </section>

</main>

</div>

