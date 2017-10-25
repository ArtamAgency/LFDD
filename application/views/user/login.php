<div id="login">
    <form class ="form_user form-horizontal" method="post" action="">
        <h4>Connexion</h4>
        <div class="control-group">
            <label class="control-label" for="login">Login</label>
            <div class="controls">
                <input class="validate[required]" type="text" name="login" placeholder="Ton pseudo" value="<?php echo set_value('login'); ?>">
                <?php echo form_error('login'); ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Mot de passe</label>
            <div class="controls">
                <input class="validate[required]" type="password" id="inputPassword" placeholder="Ton mot de passe" name="password">
                <?php echo form_error('password'); ?>
            </div>
        </div>

        <button class="btn btn-large btn-primary" type="submit">Valider</button>

    </form>
    <?php
    if ($this->session->flashdata('noconnect'))
        echo "<div class=\"alert alert-error\">
   <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  <strong>" . $this->session->flashdata('noconnect') . "<strong>
 </div>";
    ?>
</div>