<?php


class Orders{



    function __construct()
    {
        $this->request = $_POST;
        $this->table = 'wp_orders';
        $this->curent_user = get_current_user_id();
    }


    function NewOrder($user = null){
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
                'disciplin' => (isset($request['disciplin']) && !empty($request['disciplin']))?$request['disciplin']:false,
                'description' => (isset($request['description']) && !empty($request['description']))?$request['description']: false,
                'writers' => (isset($request['writers']) && !empty($request['writers']))?$request['writers']: false,
                'academic_level' => (isset($academic_level[$request['academic_level']]) && !empty($academic_level[$request['academic_level']]))? $academic_level[$request['academic_level']]: false,
                'citation_style' => (isset($style[$request['citation_style']]['text']) && !empty($style[$request['citation_style']]['text'])) ? $style[$request['citation_style']]['text']: false,
                'price' => $this->getPriceCount($request, $column),
                'deadline' => (isset($title[$request['deadline']]) && !empty($title[$request['deadline']]))?$title[$request['deadline']]: false,
                'pages' => (isset($request['pages']) && !empty($request['pages']))?$request['pages']: false,
                'data_create' => date("Y-m-d H:i:s"),
                'status' => 'new',
	            'promocod' => (isset($request['promocod']) && !empty($request['promocod']))? $request['promocod']: false,
	            'special_writer' => (isset($request['special_writer']) && $request['special_writer'] === 'on')?true:false,
	            'plagiat_report' => (isset($request['plagiat_report']) && $request['plagiat_report'] === 'on')?true:false,
	            'check_professional' => (isset($request['check_professional']) && $request['check_professional'] === 'on')?true:false,
	            'bonus_page' => (isset($request['bonus_page']) && $request['bonus_page'] === 'on')?true:false,
	            'spacing' => (isset($request['spacing']) && !empty($request['spacing']))? $request['spacing']: false,
	            'sources' => ((!isset($request['sources_need']) || $request['sources_need'] !== 'on') && isset($request['sources']))?$request['sources']:false,
	            'additional' => (isset($request['additional']) && $request['additional'] === 'on')?true:false,
	            'typy_work' => (isset($request['typy_work']) && !empty($request['typy_work']))?$request['typy_work']:false,
            )
        );
        return $wpdb->insert_id;
    }

    public function getPriceCount($request, $column)
    {
    	$startPrice = $column[$request['deadline']][$request['academic_level']];
    	$price = $startPrice;
    	if(isset($request['pages'])) {
		    $price = $startPrice * $request['pages'];
	    }
    	if(isset($request['spacing']) && $request['spacing'] == 550)
	    {
	    	$price*=2;
	    }

	    if(isset($request['bonus_page']) && $request['bonus_page'] == 'on')
	    {
	    	$price += $startPrice;
	    }

	    if(isset($request['check_professional']) && $request['check_professional'] == 'on')
	    {
		    $price += $price*0.7;
	    }

	    if(isset($request['plagiat_report']) && $request['plagiat_report'] == 'on')
	    {
	    	$price += 9.99;
	    }

	    if(isset($request['special_writer']) && $request['special_writer'] == 'on')
	    {
	    	$price += $price*0.1;
	    }

	    if(isset($request['promocod']) && !empty($request['promocod']))
	    {
		    $promoObject = get_page_by_title($request['promocod'], OBJECT, 'promo_cod');
		    if($promoObject) {
			    $promoCod = get_field( 'procent', $promoObject->ID );
			    if($promoCod) {
				    $price -= $price * $promoCod / 100;
			    }
		    }
	    }


	    return $price;
    }

    public static function getOneOrder($id){
        global $wpdb;
        $newtable = $wpdb->get_row( "SELECT * FROM " . 'wp_orders'  . " LEFT JOIN wp_deadline ON wp_orders.deadline=wp_deadline.short_name" . " WHERE wp_orders.id =" . "'" . esc_sql($id). "'");
        self::checkPermisions($newtable);
        return $newtable;
    }

    public static function checkPermisions($newtable) {
    	$curentUser = wp_get_current_user();
    	$orderOwner = $newtable->client_id;
    	if($curentUser->ID != $orderOwner && !current_user_can('administrator')) {
    		echo 'test';
    		wp_redirect(get_home_url());
	    }
    }

    function getOrdersUser($id){
        global $wpdb;
        $newtable = $wpdb->get_results( "SELECT * FROM " . $this->table  . " LEFT JOIN wp_deadline ON wp_orders.deadline=wp_deadline.short_name" . " WHERE wp_orders.client_id =" . "'" . esc_sql($id). "' ORDER BY id DESC");
        return $newtable;
    }

    public static function getDeadlineDate($order) {

		$tm = self::getDeadlineSecond($order);
	    return date("Y-m-d H:i:s",$tm);
    }

    public static function getDeadlineSecond($order) {

	    $time1 = $order->data_create;

	    $t1 = explode(" ", $time1);
	    $d1 = explode("-", $t1['0']);
	    $ti1 = explode(":", $t1['1']);



	    $tm = mktime($ti1[0],$ti1[1],$ti1[2],$d1[1],$d1[2],$d1[0]) + $order->value;

	    return $tm;
    }


    function getPostQuery(){
        echo '<pre>';
        var_dump($this->request);
        echo '</pre>';
    }

}
