<?php
/*--------------добавления нового пункта меню в админ панель-------------*/

function page_settings_theme(){
    add_theme_page(
        'Страница настройки темы',
        'Настройка темы',
        'administrator',
        'fund',
        'show_page_settings_fund'
    );
}

add_action('admin_menu', 'page_settings_theme');

/*-------------функция отображающая содержимое страницы настройки темы------------*/

function show_page_settings_fund(){
    ?>
    <!--Создаем заголовок в стандартном контейнере wrap-->
    <div class="wrap">
        <!--добавляем иконки к странице-->
        <div id="icon-themes" class="icon32"></div>
        <h2>Настройки темы</h2>

        <!-- Делаем вызов функции WordPress для вывода ошибок, возникающих при сохранении настроек. -->
        <?php settings_errors(); ?>

        <!-- Создаем форму, которая будет использоваться для вывода наших опций -->
        <form method="post" action="options.php">
            <?php settings_fields('fund'); ?>
            <?php do_settings_sections('fund'); ?>
            <?php submit_button(); ?>
        </form>
    </div><!--end wrap-->
    <?php
}


function mytheme_settings(){


    /*------регистрируем текстовое поле для адреса -------*/


    /*------регистрируем текстовое поле для первого телефона-------*/

    add_settings_field(
        'phone1',
        'Телефон:',
        'show_content_phone1',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'phone1'
    );

    add_settings_field(
        'address',
        'Address:',
        'show_content_address',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'address'
    );


    /*------регистрируем текстовое поле для e-mail -------*/

    add_settings_field(
        'email',
        'e-mail:',
        'show_content_email',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'email'
    );


    add_settings_section(
        'general_settings_section',           // ID, который будет использоваться для идентификации этой секции и по которому мы будем регистрировать опции
        '',                      // Заголовок, который будет отображаться на странице административной панели
        'show_field_settings',   // Вызов, который используется для отображения описания секции
        'fund'                             // Страница, на которую будет добавлена секция
    );

    /*------SOCIAL BUTTON -------*/



    /*------регистрируем текстовое поле для времени работы Фонда 2 -------*/

    /*------регистрируем текстовое поле для ссылки facebook-------*/

    add_settings_field(
        'facebook',
        'Facebook:',
        'show_content_facebook_link',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'facebook'
    );





    /*------регистрируем текстовое поле для ссылки facebook-------*/
    add_settings_field(
        'tw',
        'Twitter:',
        'show_content_tw_link',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'tw'
    );

    /*------регистрируем текстовое поле для ссылки facebook-------*/
    add_settings_field(
        'you',
        'Youtube:',
        'show_content_you_link',
        'fund',
        'general_settings_section'
    );

    register_setting(
        'fund',
        'you'
    );





}

add_action('admin_init', 'mytheme_settings');


/*-----------функция отображающая содержимое в секции---------*/

function show_field_settings(){
    echo "<p>В данном разделе вы можете добавить контактную информацию, которая будет отображаться на сайте.</p>";
}


/*--------------вывод текстового поля для адреса-----------*/


/*--------------вывод текстового поля для первого телефона-----------*/
function show_content_phone1(){
    $country = get_option('phone1');
    $country_field = "<input type='text' id='phone1' class='regular-text'  name='phone1' value='".get_option('phone1')."' />";
    echo $country_field;
}

/*--------------вывод текстового поля для первого телефона-----------*/
function show_content_address(){
    $country = get_option('address');
    $country_field = "<input type='text' id='address' class='regular-text'  name='address' value='".get_option('address')."' />";
    echo $country_field;
}


/*--------------вывод текстового поля для электронной почты-----------*/
function show_content_email(){
    $country = get_option('email');
    $country_field = "<input type='text' id='email' class='regular-text'  name='email' value='".get_option('email')."' />";
    echo $country_field;
}

/*--------------вывод текстового поля ссылки фейсбук-----------*/
function show_content_facebook_link(){
    $country = get_option('facebook');
    $country_field = "<input type='text' id='facebook' class='regular-text'  name='facebook' value='".get_option('facebook')."' />";
    echo $country_field;
}


/*--------------вывод текстового поля ссылки фейсбук-----------*/
function show_content_tw_link(){
    $country = get_option('tw');
    $country_field = "<input type='text' id='tw' class='regular-text'  name='tw' value='".get_option('tw')."' />";
    echo $country_field;
}


/*--------------вывод текстового поля ссылки фейсбук-----------*/
function show_content_you_link(){
    $country = get_option('you');
    $country_field = "<input type='text' id='you' class='regular-text'  name='you' value='".get_option('you')."' />";
    echo $country_field;
}

?>