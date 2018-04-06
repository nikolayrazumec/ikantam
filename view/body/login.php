<?php
session_start();
if (!empty($_SESSION["user_name"])) {
    header('Location: /');
}
define('_CONTROL', 1);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="form-group" id="singdiv">
                <h2>Sing in</h2>
                <a href="">Don’t have an account? Join now.</a>
            </div>

            <div class="form-group" id="namediv" hidden>
                <label class="control-label" for="name">User name</label>
                <input type="text" class="form-control" id="name" placeholder="User name" name="name">
                <span class="help-block"></span>
            </div>

            <div class="form-group" id="emaildiv">
                <label class="control-label" for="email">Email adress</label>
                <input type="email" class="form-control" id="email" placeholder="email@email.com" name="email">
                <span class="help-block"></span>
            </div>

            <div class="form-group" id="passdiv">
                <label class="control-label" for="password">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="password" name="pass">
                <span class="help-block"></span>
            </div>
            <div class="form-group" id="conpassdiv" hidden>
                <label class="control-label" for="conpass">Confirm password</label>
                <input type="password" class="form-control" id="conpass" placeholder="Confirm password" name="conpass">
                <span class="help-block"></span>
            </div>

            <button type="button" onclick="sendLogin()" class="btn btn-info" id="enter1" name="reg">Sing in</button>


        </div>
    </div>
</div>

<script src="assets/js/login.js"></script>