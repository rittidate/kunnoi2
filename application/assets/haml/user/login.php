<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/kunnoi2/system/libraries/phamlp/haml/HamlHelpers.php';
?><div class="container" id="signin"><?php if ($message != ''): { ?><div class="alert alert-warning alert-dismissible" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"> <span aria-hidden="true">X</span> </button> <strong><?php echo $message; ?></strong> </div><?php } ?><?php endif; ?><?php echo form_open('user/login', $form); ?><h2 class="form-signin-heading">Please sign in</h2><label class="sr-only" for="inputEmail">Email address</label><?php echo form_input($email); ?><label class="sr-only" for="inputPassword">Password</label><?php echo form_input($password); ?><div class="checkbox"><label><?php echo form_checkbox('remember', '1', FALSE); ?>Remember me</label></div><?php echo form_submit('submit', 'Sign in', "class = 'btn btn-lg btn-primary btn-block'");; ?></div>