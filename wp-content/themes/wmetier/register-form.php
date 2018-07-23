<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>



<?php $template->the_action_template_message( 'register' ); ?>
<?php $template->the_errors(); ?>

<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="/register/?instance=1" method="post" class="calculator-section">
    <div class="col error-item">
        <div class="title-row-form">Enter E-mail</div>
        <input <?php if(isset($_POST['email'])) { ?> value="<?php echo $_POST['email']; ?>" <?php } ?> placeholder="E-mail *" type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" value="<?php $template->the_posted_value( 'user_email' ); ?>" />
        <div class="error-mes">Please enter a valid email address.</div>
    </div>
    <div class="col">
        <div class="title-row-form">Password</div>
        <input required placeholder="Password *" autocomplete="off" name="pass1" id="pass12" value="" type="password" />
        <div class="error-mes">Please enter a valid email address.</div>
    </div>
    <div class="col confirmPassword">
        <div class="title-row-form">Confirm Password</div>
        <input placeholder="Password *" required autocomplete="off" name="pass2" id="pass22" value="" type="password" />
        <div class="error-mes">Please enter a valid email address.</div>
    </div>


    <div class="row-btns">
        <?php if(is_page(85)) { ?>
        <a href="<?php echo get_permalink(23); ?>" class="btn-transp-withoutBorder">Back to step one</a>
            <input type="hidden" name="amount-new-order">
        <?php } ?>
        <input type="submit" class="pink-btn" value="sign up">
    </div>
</form>