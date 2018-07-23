<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>


<?php $template->the_action_template_message( 'login' ); ?>
<?php $template->the_errors(); ?>
<form  name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login', 'login_post' ); ?>" method="post" class="calculator-section">
    <div class="col error-item">
        <div class="title-row-form">Enter E-mail</div>
        <input required type="text" placeholder="E-mail *" name="log" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'log' ); ?>">
        <div class="error-mes">Please enter a valid email address.</div>
    </div>
    <div class="col">
        <div class="title-row-form">Password</div>
        <input required name="pwd" type="password" placeholder="Password *" id="user_pass<?php $template->the_instance(); ?>" class="input" value="">
        <div class="error-mes">Please enter a valid password.</div>
    </div>
    <?php do_action( 'login_form' ); ?>
    <div class="row-btns">
        <?php if(is_page(85)) { ?>
        <a href="<?php echo get_permalink(23); ?>" class="btn-transp-withoutBorder">Back to step one</a>
            <input type="hidden" name="amount-new-order">
        <?php } ?>
        <input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="log in" class="pink-btn" />
        <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
        <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
        <input type="hidden" name="action" value="login" />

    </div>
</form>
<?php $template->the_action_links( array( 'login' => false ) ); ?>