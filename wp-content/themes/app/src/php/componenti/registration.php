<div class="col-lg-6 ">
    <h3>Non sei ancora registrato? </h3>
    <form action="<?php echo get_option('home');?>/wp-login.php?action=register" method="post">
        <div class="form-group">
            <label for="user_login">Inserisci Nickname</label>
            <input type="text" name="user_login" id="user_login" value="" class="form-control" />
        </div>
        <div class="form-group">
            <label for="user_email">Inserisci Email</label>
            <input type="psw" name="user_email" id="user_email" size="20" class="form-control" />
        </div>
            <input type="submit" name="submit" value="Send" class="btn btn-primary" />
        </div>
    </form>
</div>