<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wmetier
 */

?>






<footer class="n_footer">
    <div class="n_footer_part_1">
        <div class="n_footer_part_1_wrapper">
            <a href="<?php echo home_url(); ?>">
            <div class="n_footer_part_1_logo">

                <img src="images/logo.svg" alt="logo" title="Writing Metier">

                <span>Writing <br>Metier</span>
            </div>
            </a>
            <nav>
            <div class="n_footer_part_top_nav">
	            <?php wp_nav_menu( array('menu' => 'Home top menu' )); ?>
            </div>
            </nav>
            <div class="n_footer_part_1_secondary">
                <div class="n_footer_part_1_secondary_col_1">
                    <div>
                        <span>Email</span>
                        <a href="mailto:<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a>
                    </div>
                    <div>
                        <span>Chat</span>
                        <p>Monday 00:00 AM - Saturday 01:00 PM (UTC)</p>
                    </div>
                    <div>
                        <span>Follow us</span>
                        <dd>
                            <a href="<?php echo get_option('tw'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="19" viewBox="0 0 310 253.8">
                                    <g>
                                        <path class="st0" d="M303 29.3c-4.9 2.2-9.9 4-15 5.5 6.1-6.9 10.7-14.9 13.5-23.7.6-2 0-4.1-1.6-5.4-1.6-1.3-3.9-1.4-5.7-.4-10.9 6.4-22.6 11.1-34.9 13.8C246.9 6.9 230.1 0 212.7 0c-36.7 0-66.5 29.9-66.5 66.5 0 2.9.2 5.8.5 8.6-45.5-4-87.9-26.4-116.9-62-1-1.3-2.6-2-4.3-1.8-1.6.1-3.1 1-3.9 2.5-5.9 10.1-9 21.7-9 33.5 0 16 5.7 31.2 15.8 43.1-3.1-1.1-6.1-2.4-8.9-4-1.5-.9-3.4-.8-4.9 0-1.5.9-2.5 2.5-2.5 4.2v.9c0 23.9 12.9 45.5 32.6 57.2-1.7-.2-3.4-.4-5.1-.7-1.7-.3-3.5.3-4.7 1.6-1.2 1.3-1.6 3.2-1 4.8 7.3 22.8 26.1 39.5 48.7 44.6-18.8 11.8-40.3 18-62.9 18-4.7 0-9.5-.3-14.1-.8-2.3-.3-4.5 1.1-5.3 3.3-.8 2.2 0 4.6 2 5.9 29 18.6 62.6 28.4 97 28.4 67.8 0 110.1-31.9 133.8-58.8 29.5-33.4 46.4-77.7 46.4-121.4 0-1.8 0-3.7-.1-5.5 11.6-8.8 21.6-19.4 29.8-31.5 1.2-1.8 1.1-4.3-.3-6-1.5-1.7-3.9-2.2-5.9-1.3z"/>
                                    </g>
                                </svg>
                            </a>
                            <a href="<?php echo get_option('facebook'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="22" viewBox="0 0 156.6 310">
                                    <g>
                                        <path class="st0" d="M5 165.1h34V305c0 2.8 2.2 5 5 5h57.6c2.8 0 5-2.2 5-5V165.8h39.1c2.5 0 4.7-1.9 5-4.4l5.9-51.5c.2-1.4-.3-2.8-1.2-3.9-.9-1.1-2.3-1.7-3.7-1.7h-45V72c0-9.7 5.2-14.7 15.6-14.7h29.4c2.8 0 5-2.2 5-5V5c0-2.8-2.2-5-5-5h-42.4c-7 0-31.5 1.4-50.8 19.2C37 38.8 40 62.4 40.7 66.5v37.8H5c-2.8 0-5 2.2-5 5v50.8c0 2.8 2.2 5 5 5z"/>
                                    </g>
                                </svg>
                            </a>
                            <a href="<?php echo get_option('you'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 24 24">
                                    <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </dd>
                    </div>
                </div>
                <div class="n_footer_part_1_secondary_col_2">
                    <div class="n_footer_expand_list">
                        <h4>Academic writing</h4>
                        <ul>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - IB Essay</a>
                            </li>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - Essay writing</a>
                            </li>
                            <li class="n_footer_expand_list_item n_footer_expand_list_item_disabled">
                                <a href="#"> - ToK essay</a>
                            </li>
                            <li class="n_footer_expand_list_item n_footer_expand_list_item_disabled">
                                <a href="#"> - Urgent essay writing</a>
                            </li>
                        </ul>
                        <button class="n_footer_expand_list_btn">
                            <b>more</b>
                            <span></span>
                        </button>
                    </div>
                    <div class="n_footer_expand_list">
                        <h4>Business writing</h4>
                        <ul>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - Letter writing service</a>
                            </li>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - Presentation writing</a>
                            </li>
                            <li class="n_footer_expand_list_item n_footer_expand_list_item_disabled">
                                <a href="#"> - Speech</a>
                            </li>
                        </ul>
                        <button class="n_footer_expand_list_btn">
                            <b>more</b>
                            <span></span>
                        </button>
                    </div>
                    <div class="n_footer_expand_list">
                        <h4>content writing</h4>
                        <ul>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - Content writing for ICO websites</a>
                            </li>
                            <li class="n_footer_expand_list_item">
                                <a href="#"> - Guest blog writing service</a>
                            </li>
                            <!--<li class="n_footer_expand_list_item n_footer_expand_list_item_disabled">
							  <a href="#"> - Writing service</a>
							  </li>-->
                        </ul>
                        <button class="n_footer_expand_list_btn">
                            <b>more</b>
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="n_footer_part_1_secondary_col_3">
                    <div class="n_footer_part_1_secondary_protected">
                        <h4>Protected by:</h4>
                        <div>
                            <img src="images/shield.png" alt="protected by shield">
                            <span>
                  100% <br>
                  security <br>
                  guarantee <br>
                  </span>
                        </div>
                    </div>
                    <div class="n_footer_part_1_secondary_accept">
                        <h4>We accept:</h4>
                        <div>
                            <img src="images/PayPal11.svg.png" alt="PayPal">
                            <img src="images/visa-5-logo-png-transparent.svg.png" alt="visa">
                            <img src="images/Mastercard-logo.svg.png" alt="mastercard">
                            <img src="images/sitejabber_logo_padding.svg.png" alt="sitejabber">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="n_footer_part_2">
        <div class="n_footer_part_2_menu_wrapper">
            <ul>
                <li><a href="#">Terms and conditions</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Revision</a></li>
                <li><a href="#">Refund</a></li>
                <li><a href="#">Cookie</a></li>
            </ul>
        </div>
        <div class="n_footer_part_2_content">
            <div class="n_footer_part_2_content_wrapper">
                <div class="n_footer_part_2_content_left">
                    <h4>Attention!</h4>
                    <strong>
                        Using this service is LEGAL and IS NOT prohibited by any university/college policies
                    </strong>
                    <p>
                        You are allowed to use the original model paper you will receive in the following ways:
                    </p>
                    <ul>
                        <li>
                            1. As a source for additional understanding of the subject
                        </li>
                        <li>
                            2. As a source of ideas / reasoning for your own research (if properly referenced)
                        </li>
                        <li>
                            3. For proper paraphrasing (see your educational institution's definition of plagiarism and acceptable paraphrase)
                        </li>
                        <li>
                            4. Direct citing (if referenced properly)
                        </li>
                        <li>
                            5. Thank you very much for respecting our authors' copyrights. <br>
                            Site Management
                        </li>
                    </ul>
                </div>
                <div class="n_footer_part_2_content_right">
                    <div class="n_footer_part_2_content_right_item">
                        <h4>
                            Disclaimer
                        </h4>
                        <p>
                            One Freelance Limited: a custom writing service that provides online custom-written papers, such as term papers, research papers, thesis papers, essays, dissertations, and other custom writing services inclusive of research materials for assistance purposes only. These custom papers should be used with proper references.
                        </p>
                    </div>
                    <div class="n_footer_part_2_content_right_item">
                        <h4>
                            Cookie Policy
                        </h4>
                        <p>
                            We use cookies to give you the best possible experience on our website. By continuing to browse this site, you give consent for cookies to be used. For more details, including how you can amend your preferences, please read our <a href="#" target="_blank">Cookie Policy</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="n_footer_part_3">
        <div>
            <p>© 2013-2018 Writing Mitier. All Rights Reserved</p>
            <img src="images/dmca_protected_sml_120l.png" alt="ico">
        </div>
        <a href="http://page.ua/" target="_blank">
            <img src="images/logo-page-white.svg" alt="Page Media Solutions" title="Page Media Solutions">
        </a>
    </div>
</footer>


<!--footer.css-->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/pdfobject.min.js"></script>



<!--map key-->
<!--<script async defer-->
<!--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnKr_iId8sKFCA8MoNQ7HLlTiVF7jtTMA&callback=initMap">-->
<!--</script>-->
<!--map key-->

<?php wp_footer(); ?>
<script>
    $( document ).ready(function() {
        $('a').each(function(){

            if($(this).attr('href')=="<?php global $wp; echo home_url( $wp->request ); ?>/"){
                $(this).addClass('active-link');
            }
        });
    });
</script>

</body>
</html>