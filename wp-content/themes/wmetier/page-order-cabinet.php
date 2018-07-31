<?php

if(!isset($_GET['id'])) {
	wp_redirect(home_url());
}

$id = $_GET['id'];

$order = Orders::getOneOrder($id);

get_header(); ?>

<main class="services-page-content single-article">
	<div class="wrapper">
		<h1>Order #00001415</h1>
		<div class="content-wrapper">
			<div class="content">
				<div class="c_order_status">
					<div class="c_order_status_head">
						<span>Status</span><b><?= $order->status; ?></b>
					</div>
					<div class="c_order_status_wrapper">
						<div class="c_order_status_item">
							<span>Type of paper:</span><b><?= $order->typy_work; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Subject(Discipline):</span><b><?= $order->disciplin; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Academic Level:</span><b><?= $order->academic_level; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Citation style:</span><b><?= $order->citation_style; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Number of pages:</span><b><?= $order->pages; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Single / Double:</span><b><?php if($order->spacing == 550) echo 'Double'; else echo 'Single'; ?> - <?= $order->spacing; ?> words/page</b>
						</div>
						<div class="c_order_status_item">
							<span>Number of sources:</span><b><?= ($order->sources != null)?$order->sources:'Not needed'; ?></b>
						</div>
						<div class="c_order_status_item">
							<span>Deadline:</span><b><?= $order->deadline; ?></b>
						</div>
					</div>
				</div>
				<div class="c_order_topic">
					<div class="c_order_topic_wrapper">
						<div class="c_order_topic_main">
							<div class="c_order_topic_headers">
								<pre>Topic</pre>
								<h4><?= $order->writers; ?></h4>
							</div>
							<br>
							<pre>Instructions</pre>
							<p>
								<?= $order->description; ?>
							</p>
						</div>
						<div class="c_order_topic_main">
							<div class="c_order_topic_headers">
								<pre>Topic</pre>
								<h4>Synonyms for topic at Thesaurus</h4>
							</div>
							<br>
							<pre>Instructions</pre>
							<p>
								Myers was surprisingly candid about that last topic. Conversations on a presidential level about the topic are expected to come Friday, but many feel a change will not be made this week. <br>
								The only way this will change is by having more conversations about this topic,
								Myers was surprisingly candid about that last topic.
								Conversations on a presidential level about the topic are expected to come Friday, but many feel a change will not be made this week.
							</p>
						</div>
					</div>
					<button class="btn-transp-withoutBorder">Show more</button>
				</div>
			</div>
			<div class="sidebar">
				<div class="c_order_timer">
					<div class="c_order_timer_item">
						<pre>Date created</pre>
						<p>December 13th, Sunday, 6:40PM Grunvich</p>
					</div>
					<div class="c_order_timer_item">
						<pre>Dedline in:</pre>
						<div class="c_order_timer_block">
							<div class="c_order_timer_block_item">
								<div class="timer_numbers" id="timer_hours"></div>
								<span>hours</span>
							</div>
							<pre class="timer_numbers_divider">:</pre>
							<div class="c_order_timer_block_item">
								<div class="timer_numbers" id="timer_minutes"></div>
								<span>minutes</span>
							</div>
							<pre class="timer_numbers_divider">:</pre>
							<div class="c_order_timer_block_item">
								<div class="timer_numbers" id="timer_seconds"></div>
								<span>seconds</span>
							</div>
						</div>
					</div>
					<script>
                        var time = <?= Orders::getDeadlineSecond($order) - time(); ?>//2 часа в МС
                        function getTime(time){
                            //if (time == 0) {
                            //   document.getElementById("YOUR_SELECTOR").style.opacity = "0";
                            //};
                            var countDownDate = new Date().getTime() + time;// нынешнее время + заданное
                            var my_interval = setInterval(Clock,1000);// запускаем таймер
                            function Clock(){
                                var now = new Date().getTime();// нынешнее время
                                var distance = countDownDate - now;//
                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));//
                                //                          if (hours < 10) {
                                //                            hours = '0'+ hours;
                                //                          };
                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));//
                                //                          if (minutes < 10) {
                                //                            minutes = '0'+ minutes;
                                //                          };
                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);//
                                //                          if (seconds < 10) {
                                //                            seconds = '0'+ seconds;
                                //                          };
                                document.getElementById("timer_hours").innerHTML = hours ;//
                                document.getElementById("timer_minutes").innerHTML = minutes ;
                                document.getElementById("timer_seconds").innerHTML = seconds ;

                            }
                        }
                        getTime(time);
					</script>
				</div>
				<div class="c_order_prefer">
					<div class="c_order_header">
						<b>Order prefer</b>
					</div>
					<div class="c_order_prefer_wrapper">
						<div class="c_order_prefer_item">
							<span>1-page summary:</span><b>+$14</b>
						</div>
						<div class="c_order_prefer_item">
							<span>Professional quality check:</span><b>+$45</b>
						</div>
						<div class="c_order_prefer_item">
							<span>Plagiarism report:</span><b>+$14</b>
						</div>
						<div class="c_order_prefer_item">
							<span>Discount:</span><b>15%</b>
						</div>
					</div>
					<div class="c_order_prefer_price">
						<pre>Total price: </pre>
						<span>$239.93</span>
					</div>
					<div class="c_order_prefer_buttons">
						<a class="btn-transp-withoutBorder" href="<?= get_permalink(284) .'?id='. $_GET['id']; ?>">view invoice</a>
						<a href="#" class="pink-btn c_order_btn">pay now</a>
					</div>
				</div>
			</div>
		</div>
		<div class="content_wrapper_bottom">
			<div class="cwb_first">
				<div class="cwb_header">
					<b>Files uploaded by you</b>
				</div>

				<div class="cwb_wrapper">
					<form action="<?= get_permalink(244) . '?id=' .$_GET['id']; ?>" method="post" class="cwb_upload_form" >
						<?php echo wp_multi_file_uploader(); ?>
                        <input type="submit" id="filesUploadInputFile">
					</form>
					<div class="cwb_uploaded_files">
						<?php $files = unserialize($order->upload_file_user); ?>
						<?php foreach($files as $fileID) { ?>
							<?php $file = get_post($fileID); ?>
                            <div class="cwb_filename"><a target="_blank" href="<?= wp_get_attachment_url($fileID); ?>"><?= $file->post_title; ?></a></div>
						<?php } ?>

					</div>
					<button class="btn-transp-withoutBorder hideMoreFiles">Show more files</button>
				</div>
			</div>
			<div class="cwb_second">
				<div class="cwb_header">
					<b>Files uploaded by us</b>
				</div>
				<div class="cwb_wrapper">
					<div class="download_files">
                        <?php $files = unserialize($order->upload_file); ?>
                        <?php foreach($files as $fileID) { ?>
                            <?php $file = get_post($fileID); ?>
						<div>
							<span><?= $file->post_title; ?></span><a target="_blank" href="<?= wp_get_attachment_url($fileID); ?>" class="btn-transp-withoutBorder">Download</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button class="btn-to-top"></button>
</main>



<?php
get_footer();
