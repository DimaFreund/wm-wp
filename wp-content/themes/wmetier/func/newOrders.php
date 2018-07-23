<?php


class Orders{



    function __construct()
    {
        $this->request = $_POST;
        $this->table = 'wp_orders';
        $this->curent_user = get_current_user_id();
    }


    function NewOrder($user){
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
                'client_id' => (!empty($user))?$user:$this->curent_user,
                'disciplin' => (isset($request['discipline-task']) && !empty($request['discipline-task']))?$request['discipline-task']:false,
                'description' => (isset($request['instructions']) && !empty($request['instructions']))?$request['instructions']: false,
                'writers' => (isset($request['writer-choice']) && !empty($request['writer-choice']))?$request['writer-choice']: false,
                'academic_level' => (isset($academic_level[$request['level-dificult']]) && !empty($academic_level[$request['level-dificult']]))? $academic_level[$request['level-dificult']]: false,
                'citation_style' => (isset($style[$request['style-writing']]['text']) && !empty($style[$request['style-writing']]['text'])) ? $style[$request['style-writing']]['text']: false,
                'price' => $this->getPriceCount($request, $column),
                'deadline' => (isset($title[$request['deadline-time']]) && !empty($title[$request['deadline-time']]))?$title[$request['deadline-time']]: false,
                'pages' => (isset($request['countPage']) && !empty($request['countPage']))?$request['countPage']: false,
                'data_create' => date("Y-m-d H:i:s"),
                'status' => 'new',
	            'promocod' => (isset($request['promocod']) && !empty($request['promocod']))? $request['promocod']: false,
	            'special_writer' => (isset($request['special-writer']) && $request['special-writer'] === 'on')?true:false,
	            'plagiat-report' => (isset($request['plagiat-report']) && $request['plagiat-report'] === 'on')?true:false,
	            'check_professional' => (isset($request['check-professional']) && $request['check-professional'] === 'on')?true:false,
	            'bonus_page' => (isset($request['bonus-page']) && $request['bonus-page'] === 'on')?true:false,
	            'spacing' => (isset($request['type-task-content']) && !empty($request['type-task-content']))? $request['type-task-content']: false,
	            'sources' => ((!isset($request['source_no_need']) || $request['source_no_need'] !== 'on') && isset($request['count-sources']))?$request['count-sources']:false
            )
        );
        $_POST['discipline-task'] = 'test';
    }

    public function getPriceCount($request, $column)
    {
    	$startPrice = $column[$request['deadline-time']][$request['level-dificult']];
    	$price = $startPrice * $request['countPage'];

    	if(isset($request['type-task-content']) && $request['type-task-content'] == 550)
	    {
	    	$price*=2;
	    }

	    if(isset($request['bonus-page']) && $request['bonus-page'] == 'on')
	    {
	    	$price += $startPrice;
	    }

	    if(isset($request['check-professional']) && $request['check-professional'] == 'on')
	    {
		    $price += $price*0.7;
	    }

	    if(isset($request['plagiat_report']) && $request['plagiat_report'] == 'on')
	    {
	    	$price += 9.99;
	    }

	    if(isset($request['special-writer']) && $request['special-writer'] == 'on')
	    {
	    	$price += $price*0.1;
	    }

	    if(isset($request['promocod']) && !empty($request['promocod']))
	    {
		    $promoObject = get_page_by_title($request['promocod'], OBJECT, 'promo_cod');
		    $promoCod = get_field('procent', $promoObject->ID);
		    $price -= $price * $promoCod/100;
	    }


	    return $price;
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
