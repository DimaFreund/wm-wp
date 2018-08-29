<?php

if(!isset($_GET['id'])) {
	wp_redirect(home_url());
}

$id = $_GET['id'];

$order = Orders::getOneOrder($id);

$user = wp_get_current_user();

$upload_files = unserialize($order->upload_file);
$upload_file = $upload_files[0];


get_header(); ?>

	<main class="orderRegistration-page-content single-article registration-styles">
		<div class="wrapper">
			<h1>Invoice</h1>
			<div class="invoice_block">
				<div class="invoice_block_header">
					<a href="#">Send by email</a>
                    <?php if(!empty($upload_file)) { ?>
					<a download href="<?= wp_get_attachment_url($upload_file); ?>">download</a>
                    <?php } ?>
					<a href="<?= get_permalink(244) . '?id='. $_GET['id']; ?>">back to order</a>
				</div>
				<div class="invoice_block_wrapper">
					<div class="invoice_block_wrapper_adr">
						<address><?= get_site_url(); ?></address>
						<address><?php echo get_option('email'); ?></address>
					</div>
					<div class="invoice_block_personal_info">
						<b>Personal information</b>
						<p>Email: <?= $user->data->user_email; ?></p>
					</div>
					<h2>Order: #<?= $order->id; ?></h2>
					<div class="invoice_order_details">
						<div class="invoice_order_details_item">
							<b>Date:</b>
							<pre><?= $order->data_create; ?></pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Deadline:</b>
							<pre><?= Orders::getDeadlineDate($order); ?></pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Type of paper:</b>
							<pre><?= $order->typy_work; ?></pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Single / Double:</b>
							<pre><?php if($order->spacing == 550) echo 'Double'; else echo 'Single'; ?> - <?= $order->spacing; ?> words/page</pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Academic Level:</b>
							<pre><?= $order->academic_level; ?></pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Number of pages:</b>
							<pre><?= $order->pages; ?></pre>
						</div>
						<div class="invoice_order_details_item">
							<b>Type of sources:</b>
							<pre><?= ($order->sources != null)?$order->sources:'Not needed'; ?></pre>
						</div>
					</div>
				</div>
				<div class="invoice_total_price">
					<b>Total price: </b><span>$<?= $order->price; ?></span>
				</div>
			</div>
			<div class="invoce_bootom_text">
                <?php the_post(); ?>
				<?php the_content(); ?>
			</div>
		</div>
		<button class="btn-to-top"></button>
	</main>


<?php
get_footer();
