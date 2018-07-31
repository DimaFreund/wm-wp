<?php

if(!isset($_GET['id'])) {
	wp_redirect(home_url());
}

$id = $_GET['id'];

$order = Orders::getOneOrder($id);

get_header(); ?>

 <pre>

 </pre>
	<main class="orderRegistration-page-content single-article registration-styles">
		<div class="wrapper">
			<h1>Invoice</h1>
			<div class="invoice_block">
				<div class="invoice_block_header">
					<a href="#">Send by email</a>
					<a href="#">download</a>
					<a href="#">back to order</a>
				</div>
				<div class="invoice_block_wrapper">
					<div class="invoice_block_wrapper_adr">
						<address>wmetier.xpage.com.ua</address>
						<address>no-reply@wmetier.com</address>
					</div>
					<div class="invoice_block_personal_info">
						<b>Personal information</b>
						<p>Email: berrington.ethan@gmail.com</p>
						<p>Phone number: 1 (800) 281-2642</p>
					</div>
					<h2>Order: #00001415</h2>
					<div class="invoice_order_details">
						<div class="invoice_order_details_item">
							<b>Date:</b>
							<pre>13/08/2017</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Deadline:</b>
							<pre>20/08/2017</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Type of paper:</b>
							<pre>Criticue Writing</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Single / Double:</b>
							<pre>Double - 275 words/page</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Academic Level:</b>
							<pre>Master (IB)</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Number of pages:</b>
							<pre>45</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Type of sources:</b>
							<pre>4</pre>
						</div>
					</div>
				</div>
				<div class="invoice_total_price">
					<b>Total price: </b><span>$239.93</span>
				</div>
			</div>
			<div class="invoce_bootom_text">
				<p>Please do not hesitate to contact us, should you happen to have any
					queries or require additional assistance.
				</p>
				<p>
					Truly yours, <br>
					Wmetier.com Team
				</p>
			</div>
		</div>
		<button class="btn-to-top"></button>
	</main>


<?php
get_footer();
