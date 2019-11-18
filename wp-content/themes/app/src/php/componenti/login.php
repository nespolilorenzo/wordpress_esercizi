<div class="col-lg-6">
    <h3>Login</h3>
    <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
        <div class="form-group">
            <label for="log">Inserisci Nickname</label>
            <input type="text" name="log" id="log" value="" size="20" class="form-control" />
        </div>

        <div class="form-group">
            <label for="pwd">Inserisci Password</label>
            <input type="password" name="pwd" id="pwd" size="20" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Send" class="btn btn-primary" />

        <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked"
                value="forever" /> Remember me</label>
        <br/>
        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    </form>
    <br/>
    <a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recupera password</a>
</div>
<br/>