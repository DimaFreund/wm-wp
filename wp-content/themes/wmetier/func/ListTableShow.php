<?php

/*
Plugin Name: WP_List_Table Class Example
Plugin URI: https://www.sitepoint.com/using-wp_list_table-to-create-wordpress-admin-tables/
Description: Demo on how WP_List_Table Class works
Version: 1.0
Author: Collins Agbonghama
Author URI:  https://w3guy.com
*/

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Customers_List extends WP_List_Table {

    /** Class constructor */
    public function __construct() {

        parent::__construct( array(
            'singular' => __( 'Customer', 'sp' ), //singular name of the listed records
            'plural'   => __( 'Customers', 'sp' ), //plural name of the listed records
            'ajax'     => false //should this table support ajax?

        ) );

    }

    /**
     * Retrieve customers data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_customers( $per_page = 5, $page_number = 1 ) {

        global $wpdb;

        $sql = "SELECT * FROM {$wpdb->prefix}orders";
        $sql .= " LEFT JOIN {$wpdb->prefix}users ON {$wpdb->prefix}orders.client_id = {$wpdb->prefix}users.ID";
        $sql .= " LEFT JOIN {$wpdb->prefix}deadline ON {$wpdb->prefix}orders.deadline = {$wpdb->prefix}deadline.short_name";
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
            $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
        }

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        return $result;
    }


    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_customer( $id ) {
        global $wpdb;

        $wpdb->delete(
            "{$wpdb->prefix}orders",
            array( 'ID' => $id ),
            array( '%d' )
        );
    }


    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count() {
        global $wpdb;

        $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}orders";

        return $wpdb->get_var( $sql );
    }


    /** Text displayed when no customer data is available */
    public function no_items() {
        _e( 'No customers avaliable.', 'sp' );
    }


    /**
     * Render a column when no column specific method exist.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        switch ( $column_name ) {
            case 'data_create':
            case 'deadline':
            case 'price':
            case 'writers':
            case 'pages':
            case 'user_email':
            case 'citation_style':
            case 'academic_level':
            case 'typy_work':
            case 'description':
            case 'disciplin':
            case 'status':
            case 'city':
                return $item[ $column_name ];
            default:
                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['ID']
        );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name( $item ) {

        $delete_nonce = wp_create_nonce( 'sp_delete_customer' );

        $title = '<a href="?page=custom_detail&action=edit&id=' . absint( $item['id']) . '"><strong>' . $item['id'] . '</strong></a>';

        $actions = array(
            'edit' => sprintf( '<a href="?page=custom_detail&action=%s&id=%s">Edit</a>', 'edit', absint( $item['id'] ) ),
            'delete' => sprintf( '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce )

        );

        return $title . $this->row_actions( $actions );
    }


    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb'      => '<input type="checkbox" />',
            'name'    => __( 'Номер заказа', 'sp' ),
            'user_email'    => __( 'E-mail', 'sp' ),
            'price' => __( 'Цена', 'sp' ),
            'pages' => __( 'Страниц', 'sp' ),
            'citation_style' => __( 'Стиль', 'sp' ),
            'academic_level' => __( 'Уровень', 'sp' ),
            'description' => __( 'Описание', 'sp' ),
            'writers' => __( 'Исполнитель', 'sp' ),
            'disciplin' => __( 'Дисциплина', 'sp' ),
            'typy_work'    => __( 'Тип работы', 'sp' ),
            'deadline'=> 'Дедлайн',
            'status'=> 'Статус',
            'data_create' => __('Дата заказа', 'sp' ),
        );

        return $columns;
    }


    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', true ),
            'city' => array( 'city', false )
        );

        return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = array(
            'bulk-delete' => 'Delete'
        );

        return $actions;
    }


    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'customers_per_page', 5 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count();

        $this->set_pagination_args( array(
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page //WE have to determine how many items to show on a page
        ) );

        $this->items = self::get_customers( $per_page, $current_page );
    }

    public function process_bulk_action() {

        //Detect when a bulk action is being triggered...
        if ( 'delete' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, 'sp_delete_customer' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                self::delete_customer( absint( $_GET['customer'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url
                add_action ('wp_loaded', 'my_custom_redirect');
                function my_custom_redirect() {
                    wp_redirect( esc_url_raw(add_query_arg()) );
                    exit;
                }



            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
            || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
        ) {

            $delete_ids = esc_sql( $_POST['bulk-delete'] );

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                self::delete_customer( $id );

            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            wp_redirect( esc_url_raw(add_query_arg()) );
            exit;
        }
    }

}


class SP_Plugin {

    // class instance
    static $instance;

    // customer WP_List_Table object
    public $customers_obj;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
        add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
    }


    public static function set_screen( $status, $option, $value ) {
        return $value;
    }

    public function plugin_menu() {

        $hook = add_menu_page(
            'Заказы',
            'Заказы',
            'manage_options',
            'wp_list_table_class',
            array( $this, 'plugin_settings_page' )
        );

        add_action( "load-$hook", array( $this, 'screen_option' ) );

        add_submenu_page("manage_options","Custom Detail","Custom Detail",'edit_posts',"custom_detail", "custom_detail_page");

    }



    /**
     * Plugin settings page
     */
    public function plugin_settings_page() {
        ?>
        <div class="wrap">
            <h2>Заказы</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <?php
                                $this->customers_obj->prepare_items();
                                $this->customers_obj->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
        <?php
    }

    /**
     * Screen options
     */
    public function screen_option() {

        $option = 'per_page';
        $args   = array(
            'label'   => 'Customers',
            'default' => 5,
            'option'  => 'customers_per_page'
        );

        add_screen_option( $option, $args );

        $this->customers_obj = new Customers_List();
    }


    /** Singleton instance */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}



SP_Plugin::get_instance();





function custom_detail_page(){
    global $wpdb;

    if(isset($_POST['status'])) {
        $wpdb->query("UPDATE wp_orders SET status = " . "'" .$_POST['status'] . "'" . "	WHERE id = " . $_GET['id']);
    }
    if(isset($_POST['uploader_custom'])) {
        $wpdb->query("UPDATE wp_orders SET upload_file = " . "'" .$_POST['uploader_custom'] . "'" . "	WHERE id = " . $_GET['id']);
    }
    $obj = new Orders();
    $result = $obj->getOneOrder($_GET['id']);
    wp_register_style('main', get_template_directory_uri() . '/css/style.css', false, 1.0);
    wp_enqueue_style('main');



    $time1 = $result->data_create;

    $t1 = explode(" ", $time1);
    $d1 = explode("-", $t1['0']);
    $ti1 = explode(":", $t1['1']);



    $tm = mktime($ti1[0],$ti1[1],$ti1[2],$d1[1],$d1[2],$d1[0]) + $result->value;



    ?>
<div class="wrap">
    <h1>Детали заказа:</h1>

    <form method="post" action="">

        <div class="orderIem-section">
            <div class="rowOrder rowCanceled">
                <div class="cell moreDetailsBtn">
                    <strong>Номер заказа:</strong><span>#<?php echo $result->id; ?></span>

                </div>



            </div>

            <div class="order-details-section">
                <div class="order-details-content">
                    <div class="col details-col">
                        <div class="details-title">
                            Details
                        </div>
                        <div class="details-desc">
                            <div class="row">
                                <div class="name-details">Type of paper:</div>
                                <div class="desc-details"><?php echo $result->typy_work; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Pages:</div>
                                <div class="desc-details"><?php echo $result->pages; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Academic Level:</div>
                                <div class="desc-details"><?php echo $result->academic_level; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Discipline:</div>
                                <div class="desc-details"><?php echo $result->disciplin; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Citation style:</div>
                                <div class="desc-details"><?php echo $result->citation_style; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Writer:</div>
                                <div class="desc-details"><?php echo $result->writers; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col timelines-col">
                        <div class="details-title">
                            Timelines
                        </div>
                        <div class="details-desc">
                            <div class="row">
                                <div class="name-details">Started:</div>
                                <div class="desc-details"><?php echo $result->data_create; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Urgency:</div>
                                <div class="desc-details"><?php echo $result->full_name; ?></div>
                            </div>
                            <div class="row">
                                <div class="name-details">Deadline:</div>
                                <div class="desc-details"><?php echo date("Y-m-d H:i:s",$tm); ?></div>
                            </div>
                        </div>

                    </div>
                    <div class="col otherInfromation-col">
                        <div class="details-title">
                            Other Infromation
                        </div>
                        <div class="details-desc">
                            <div class="row">
                                <div class="name-details">Actual topic:</div>
                                <div class="desc-details"><?php echo $result->writers; ?></div>
                            </div>
                            <div class="row instructionsRow">
                                <div class="name-details">Instructions From:</div>
                                <div class="desc-details"><?php echo $result->description; ?>
                              </div>
                            </div>
                            <div class="row total-price-row">
                                <div class="total-price">
                                    <div class="title">Total price: </div>
                                    <div class="znak">$</div>
                                    <div class="res"><?php echo $result->price; ?></div>
                                </div>
                            </div>


                    </div>
                </div>


            </div>
        </div>


        <style>
            .table-order-price input{
                text-align: center;
            }
            .orderIem-section .order-details-section {
                display: block;
                height: auto;
            }
            form .rowOrder .cell.moreDetailsBtn {
                background: none;
            }
            .wrap-custom-element-orders div {
                display: inline-block;
            }
            .submit {
                width: auto;
                margin: 0px 30px!important;
                float: right;
            }
        </style>
        <div style="float: right" class="wrap-custom-element-orders">
            <?php
            if ( isset( $_REQUEST['saved'] ) ){
            echo '<div class="updated"><p>Сохранено.</p></div>';
            }
            ?><div class="wrap">
                    <?php
                    if( function_exists( 'true_image_uploader_field' ) ) {
                        true_image_uploader_field('uploader_custom', $result->upload_file);
                    }
                    ?><p class="submit">
                        <input type="hidden" name="action" value="save" />
                    </p>

            </div>

            <?php $arr_status = array('IN PROGRESS', 'CANCELED', 'NEW', 'DONE'); ?>
            <div class="cell statusCell">
                <select name="status" id="for-status-order-admin">
                    <?php foreach( $arr_status as $item) { ?>
                    <option <?php if($item == $result->status) echo 'selected'; ?> value="<?php echo $item; ?>"><?php echo $item; ?></option>
                    <?php } ?>
                </select>
            </div>


        <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
        <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>


        <?php submit_button(); ?>
        </div>
    </form>

</div>





<?php }



add_action('admin_enqueue_scripts', function(){
    /*
    if possible try not to queue this all over the admin by adding your settings GET page val into next
    if( empty( $_GET['page'] ) || "my-settings-page" !== $_GET['page'] ) { return; }
    */
    wp_enqueue_media();
});
