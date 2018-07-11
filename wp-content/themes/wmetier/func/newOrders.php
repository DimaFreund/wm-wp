<?php


class Orders{



    function __construct()
    {
        $this->request = $_POST;
        $this->table = 'wp_orders';
        $this->curent_user = get_current_user_id();
    }


    function NewOrder(){
        global $wpdb;
        $request = $this->request;
        $style = get_field('citation_style', 23);


        $column = array();
        $title = array();
        $days = json_decode(get_option('all_time_order'));
        $academic_level = json_decode(get_option('academic_level'));
        foreach($days as $day) {
            $arr = json_decode(get_option($day));
            array_push($title, array_shift($arr));
            array_push($column, $arr);
        }

        $wpdb->insert(
            $this->table,
            array(
                'client_id' => $this->curent_user,
                'disciplin' => $request['discipline-task'],
                'typy_work' => $request['type-task'],
                'description' => $request['instructions'],
                'writers' => $request['writer-choice'],
                'academic_level' => $academic_level[$request['level-dificult']],
                'citation_style' => $style[$request['style-writing']]['text'],
                'price' => $column[$request['deadline-time']][$request['level-dificult']]*$request['countPage'],
                'deadline' => $title[$request['deadline-time']],
                'pages' => $request['countPage'],
                'data_create' => date("Y-m-d H:i:s"),
                'status' => 'new'
            )
        );
        $_POST['discipline-task'] = 'test';
    }
    function getOneOrder($id){
        global $wpdb;
        $newtable = $wpdb->get_row( "SELECT * FROM " . $this->table  . " LEFT JOIN wp_deadline ON wp_orders.deadline=wp_deadline.short_name" . " WHERE wp_orders.id =" . "'" . esc_sql($id). "'");
        return $newtable;
    }

    function getOrdersUser($id){
        global $wpdb;
        $newtable = $wpdb->get_results( "SELECT * FROM " . $this->table  . " LEFT JOIN wp_deadline ON wp_orders.deadline=wp_deadline.short_name" . " WHERE wp_orders.client_id =" . "'" . esc_sql($id). "'");
        return $newtable;
    }

    function getPostQuery(){
        echo '<pre>';
        var_dump($this->request);
        echo '</pre>';
    }

}
