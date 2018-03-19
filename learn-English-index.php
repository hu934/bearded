<?php
/*Template Name: learn-English Front Page*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php bloginfo('name'); ?><?php wp_title('|', true, ''); ?></title>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/ztime/css/global.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/ztime/css/style.css" type="text/css"/>

		<?php //wp_head();?>

	</head>
	
<?php if(qtranxf_getLanguage() == "en") : $imgDir="en"?><?php endif;?>
<?php if(qtranxf_getLanguage() == "zh") : $imgDir="tw"?><?php endif;?>
<?php if(qtranxf_getLanguage() == "ZH") : $imgDir="zh"?><?php endif;?>

	<body>
		<header id="head">
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<?php
                        wp_nav_menu(array(
                            'menu' => 'loginMenu',
                            'container' => false,
                            'menu_class' => 'navbar-left'
                        ));
                    ?>
					<?php
                        wp_nav_menu(array(
                            'menu' => 'languageMenu',
                            'container' => false,
                            'menu_class' => 'navbar-right',
                        ));
                    ?>

					<!--购物车 开始-->
					<ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo WC()->cart->get_cart_total(); ?> | <?php echo WC()->cart->get_cart_contents_count(); ?><span class="caret"></span></a>
                             <ul class="dropdown-menu" role="menu" <?php if ( WC()->cart->get_cart_contents_count() >= 2 ) {?>style="height:400px; overflow-y: auto;"<?php } ?>>
                                            <?php
                                            global $woocommerce;
                                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                    ?>
                                                    <li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                    <div class="col-sm-12">
                                        <div class="prod-class">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                     <span class="product-remove">
                                                <?php
                                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                    '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                    esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                                    __( 'Remove this item', 'woocommerce' ),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() )
                                                ), $cart_item_key );
                                                ?>
                                            </span>
                                                    <span class="product-name">
                                                <?php
                                                if ( ! $product_permalink ) {
                                                    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                                                } else {
                                                    echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
                                                }

                                                // Meta data
                                                echo WC()->cart->get_item_data( $cart_item );
                                                ?>
                                            </span>
                                                </div>
                                                <div class="col-sm-5">
                                                    <span class="product-thumbnail">
                                                <?php
                                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                                if ( ! $product_permalink ) {
                                                    echo $thumbnail;
                                                } else {
                                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                                }
                                                ?>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } }?>
                                <?php if ( WC()->cart->get_cart_contents_count() > 0 ) {?>
                                <div class="col-sm-12">
                                    <h4 class="subtotal"><strong>Subtotal:</strong> <?php wc_cart_totals_subtotal_html(); ?></h4>
                                </div>
                                <div class="col-sm-12">
                                    <div class="text-center">
                                        <a href="<?php echo $cart_url = $woocommerce->cart->get_cart_url();?>" class="btn-cart">View Cart</a>
                                        <a href="<?php echo $checkout_url = $woocommerce->cart->get_checkout_url(); ?>"  class="btn-checkout">Checkout</a>
                                    </div>

                                </div>
                                <?php } ?>
                                </li>
                                <?php if ( WC()->cart->get_cart_contents_count() == 0 ) {?>
                                    <li class="pro">No products in the cart.</li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
					<!--购物车 结束-->
					<?php
                        wp_nav_menu(array(
                            'menu' => 'rightMenu',
                            'container' => false,
                            'menu_class' => 'navbar-right',
                        ));
                    ?>
				</div>
			</nav>

			<div class="container">
				<div class="row">
					<span><img class="studyenglish" src="<?php echo get_template_directory_uri();?>/assets/ztime/img/<?php echo $imgDir;?>/text_1.png"/></span>
					<!--<div class="col-md-12 text-center">
						<?php the_content(); ?>
					</div>-->
				</div>

				<div class="row-two">
					<div class="row-div">
					
					<div class="bg-div">
						<video id="video06" width="600" height="400" class="video" autoplay="autoplay" preload="none" poster="/wp-content/uploads/abc_magician-04.jpg" controls="" controlslist="nodownload">
							<source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/abc_magician.mp4" type="video/mp4">
							<source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/abc_magician.mkv" type="video/mkv">
							<source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/abc_magician.ogv" type="video/ogv">
							Your browser does not support HTML5 video.
						</video>
					</div>

					<div class="train">
						<div class="train-div one"><a href="#">
							<?php if(qtranxf_getLanguage() == "en") : ?><span class="en-span">Take a Photo</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "zh") : ?><span>拍個照</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?><span>拍个照</span><?php endif;?>
						</a></div>
						<div class="train-div two"><a href="#">
							<?php if(qtranxf_getLanguage() == "en") : ?><span class="en-span">Upload it to us</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "zh") : ?><span>上傳我們</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?><span>上传我们</span><?php endif;?>
						</a></div>
						<div class="train-div thir"><a href="#">
							<?php if(qtranxf_getLanguage() == "en") : ?><span class="en-span">We'll do the rest</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "zh") : ?><span>我們辦妥</span><?php endif;?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?><span>我们办妥</span><?php endif;?>
						</a></div>
					</div>
					<div class="leftbg-one"></div>
				</div>
			</div>
		</div>
		</header>
		<section class="vide-inner">
			<div class="row">
				<span><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/<?php echo $imgDir;?>/title_1.png"/></span>
				<p class="txt">
					<?php if(qtranxf_getLanguage() == "en") : ?>Yes, give Your Child a Starring Role in an eBook or Paper Book!<?php endif;?>
					<?php if(qtranxf_getLanguage() == "zh") : ?>是的，給你的孩子在電子書或紙本書中擔任主角！<?php endif;?>
					<?php if(qtranxf_getLanguage() == "ZH") : ?>是的，给你的孩子在电子书中或纸本书中担任主角<?php endif;?>
				</p>
			</div>
			<div class="row-div">
				<div class="bg-div-zj"><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/img_2.png"/></div>
			</div>
		</section>
		<section class="vide-inner">
			<div class="row">
				<span><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/<?php echo $imgDir;?>/title_2.png"/></span>
				<p class="txt">
					<?php if(qtranxf_getLanguage() == "en") : ?>For Chinese Children aged from 2 to 8 <br> We help your child learn to Speak English and Read English stories<?php endif;?>
					<?php if(qtranxf_getLanguage() == "zh") : ?>專為2至8歲的中國兒童而設，幫助你的孩子學習英語發音及閱讀英文故事<?php endif;?>
					<?php if(qtranxf_getLanguage() == "ZH") : ?>专为2至8岁的中国儿童而设，帮助你的孩子学习英语发音及阅读英文故事<?php endif;?>
				</p>
			</div>
			<div class="row-div">
				<div class=""><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/bg_2.png"/></div>
				<div class="leftbg-two"></div>
			</div>
		</section>
		<section class="vide-inner">
			<div class="row">
				<span><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/<?php echo $imgDir;?>/title_3.png"/></span>
			</div>
			<div class="row-div">
				<div class="push-bottom">
					<div class="col-left">
						<div class="push-top">
							<span class="icon-shu"></span>
							<?php if(qtranxf_getLanguage() == "en") : ?>
								<b>Paper Books (30-70 pages A4 Perfect Binding)</b>
								<p>Delivered within 7 working days</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "zh") : ?>
								<b>紙本書籍（30-70頁 A4精裝裝訂）</b>
								<p>7個工作日送貨</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?>
								<b>纸本书籍（30-70页A4精装装订）</b>
								<p>7个工作日送货</p>
							<?php endif?>
						</div>
						<div class="push-bot">
							<span class="icon-shu1"></span>
							<?php if(qtranxf_getLanguage() == "en") : ?>
								<b>eBooks on Smart Phones, iPad, PC</b>
								<p>Delivered within 24 hours as a link</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "zh") : ?>
								<b>電子書可智能電話，平板電腦及電腦上閱讀</b>
								<p>購買後24小時內透過超連結下載</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?>
								<b>电子书可智能电话，平板电脑及电脑上阅读</b>
								<p>购买后24小时内透过超连结下载</p>
							<?php endif?>
						</div>
					</div>
					<div class="col-center">
						<div class="video-center">
							<video preload="none" height="304" controls="" controlslist="nodownload" style="width:100%" id="vdHotPress" class="video-in" poster="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/Illustration.gif">
                                <source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/Illustration.mp4" type="video/mp4">
                                <source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/Illustration.mkv" type="video/mkv">
                                <source src="https://www.bee4two.cn/wp-content/themes/bearded-master/assets/video/Illustration.ovg" type="video/ovg">
                                Your browser does not support HTML5 video.
                            </video>
						</div>
					</div>
					<div class="col-right">
						<div class="push-top">
							<span class="icon-shu2"></span>
							<?php if(qtranxf_getLanguage() == "en") : ?>
								<b>Videos on Smart Phones, iPad, PC</b>
								<p>Delivered within 24 hours as a link</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "zh") : ?>
								<b>視頻可於智能電話，平板電腦及電腦上播放</b>
								<p>購買後24小時內透過超連結下載</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?>
								<b>视频可于智能电话，平板电脑及电脑上播放</b>
								<p>购买后24小时内透过超连结下载</p>
							<?php endif?>
						</div>
						<div class="push-bot">
							<span class="icon-shu3"></span>
							<?php if(qtranxf_getLanguage() == "en") : ?>
								<b>Introducing The Alphabet Videos</b>
								<p>That make it possible to see and listen to Your Child Speaking Perfect English.</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "zh") : ?>
								<b>為你介紹英文字母視頻</b>
								<p>可幫助你的小孩講一口流利的英語會話</p>
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?>
								<b>为你介绍英文字母</b>
								<p>可帮助你的小孩讲一口流利的英语会话</p>
							<?php endif?>
						</div>
					</div>
					<div>
						<a class="btn-default" href="/allproducts/">
							<?php if(qtranxf_getLanguage() == "en") : ?>
								See Our Products & Prices
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "zh") : ?>
								查看所有產品及價錢
							<?php endif?>
							<?php if(qtranxf_getLanguage() == "ZH") : ?>
								查看所有产品及价钱
							<?php endif?>
						</a>
					</div>
				</div>
				<div class="leftbg-thir"></div>
			</div>
		</section>
		<section class="vide-inner">
			<div class="row">
				<span><img src="<?php echo get_template_directory_uri();?>/assets/ztime/img/<?php echo $imgDir;?>/title_4.png"/></span>
			</div>
			<div class="row-div">
				<div class="bg-div-aboutus">
					<?php if(qtranxf_getLanguage() == "en") : ?>
						<h3 class="one-h3">New Excitement in Reading</h3>
						<p>Children love to play, and most of all, they love to role-play. Think of the excitement of seeing themselves in books and videos. Think of the new world of learning when personalised books become the norm. All these are happening now — for the first time, your kid is not just reading a story. Your kid is the story!</p>
						<h3>More than just Fun!</h3>
						<p>While our artists are having fun in the Illustration Department, Speech Specialists gather in the R&D Lab to analyse facial muscles and mouth movements. If you want to see how a kid delivers “V” and “Th” correctly, you don’t have to go far. Pick a Greeting Video here and you’ll see you own child doing it — with correct and beautiful mouth movements</p>
						<h3>Lost on the First Day to School?</h3>
						<p>There is no lack of kindergarten curricula but surprisingly publishers have yet to come up with an effective system that prepares your child for primary education. Teachers still tell your kid “boxes” is the plural of “box” but can’t turn the clock back to introduce that word before the first school day. Our learning package is unique:</p>
						<p>* The Alphabet Video includes 26 words that cover all the English vowels you’ll ever need to learn.</p>
						<p>* Our Vocabulary Package includes all English words your child needs to know before starting school. But it’s our Customised Profile and Assignment scheme that ensure no lesson is missed and no child is left behind.</p>
						<p>* Sentence Structures and other grammar features are hidden as part of their favourite stories. In this way, children enjoy building up grammar concepts and skills in a transparent way to master their lifelong language learning.</p>
					<?php endif?>
					<?php if(qtranxf_getLanguage() == "zh") : ?>
						<h3 class="one-h3">刺激的閱讀體驗</h3>
						<p>小孩都愛遊戲，其中最吸引他們的，是角色扮演的遊戲。試幻想，他們看到自己是書本和影片中的小主角時，會有多興奮？試幻想，這種個性化的書本和刺激的閱讀經驗，普及至每一位小讀者… 這一切，已經實現了！由今天起，你的小孩不只是閱讀故事，甚至置身故事中！</p>
						<h3>除了趣味，還有更多！</h3>
						<p>製作這些英語教學動畫也令我們的設計師很快樂，語言專家聚集在R&D 研究室認真地分析發音時的面部肌肉及口腔動作。如果你想知道你的小孩如何把’V’和’Th’正確地發音，由今天起，變得很容易了。你只要選購我們的問候語視頻，你的小孩也可以運用正確的口腔動作，準確地發音和講英文了！</p>
						<h3>迷失在上課第一天？</h3>
						<p>市場上不缺專為幼兒而設的英語教材，可是，令人意外的是，很少出版社推出了真正有效地為幼兒準備升讀小學的教材。你的小孩會從小學老師的課堂上學習”Boxes”是”Box”的複數，可是，你的小孩跟本不認識那個詞語。為了令你的小孩更棒，我們的英語教材是獨一無二的：</p>
						<p>* 英文字母視頻會教授 26 個詞彙，包含了所有英語的元音，這些詞語是你的小孩必須認識的。</p>
						<p>* 我們的英語詞彙套裝包含的所有英語詞彙，是你的小孩在小學之前必須認識的。我們提供評估學習進度的功能，確保小孩不會遺漏任何一課，以及可以跟上學習進度。</p>
						<p>* 英語句式和其他英文語法的運用隱藏在他們最喜歡的故事中，這種潛移默化的學習模式，令他們學習英文語法時得到快樂，有效扶助及提升他們日後的語言學習能力。</p>
					<?php endif?>
					<?php if(qtranxf_getLanguage() == "ZH") : ?>
						<h3 class="one-h3">刺激的阅读体验</h3>
						<p>小孩都爱游戏，其中最吸引他们的，是角色扮演的游戏。试幻想，他们看到自己是书本和视频中的小主角时，会有多兴奋？试幻想，这种个性化的书本和刺激的阅读经验，普及至每一位小读者… 这一切，已经实现了！由今天起，你的小孩不只是阅读故事，甚至置身故事中！</p>
						<h3>除了趣味，还有更多！</h3>
						<p>制作这些英语教学动画也令我们的设计师很快乐，语言专家聚集在R&D 研究室认真地分析发音时的面部肌肉及口腔动作。如果你想知道你的小孩如何把’V’和’Th’正确地发音，由今天起，变得很容易了。你只要选购我们的问候语视频，你的小孩也可以运用正确的口腔动作，准确地发音和讲英文了！</p>
						<h3>迷失在上课第一天？</h3>
						<p>市场上不缺专为幼儿而设的英语教材，可是，令人意外的是，很少出版社推出了真正有效地为幼儿准备升读小学的教材。你的小孩会从小学老师的课堂上学习”Boxes”是”Box”的复数，可是，你的小孩跟本不认识那个词语。为了令你的小孩更棒，我们的英语教材是独一无二的：</p>
						<p>* 英文字母视频会教授 26 个词汇，包含了所有英语的元音，这些词语是你的小孩必须认识的。</p>
						<p>* 我们的英语词汇套装包含的所有英语词汇，是你的小孩在小学之前必须认识的。我们提供评估学习进度的功能，确保小孩不会遗漏任何一课，以及可以跟上学习进度。</p>
						<p>* 英语句式和其他英文语法的运用隐藏在他们最喜欢的故事中，这种潜移默化的学习模式，令他们学习英文语法时得到快乐，有效扶助及提升他们日后的语言学习能力。</p>
					<?php endif?>
				</div>
			</div>
		</section>
		<footer class="foot-inner">
			<div class="footer-div">
				<div class="row fo-row">
					<ul class="fo-nav fonav-one">
						<?php if(qtranxf_getLanguage() == "en") : ?>
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li> <a href="/refund-policy">Refund Policy</a></li>
							<li> <a href="/terms_of_use">Terms & Condition</a></li>
						<?php endif ?>

						<?php if(qtranxf_getLanguage() == "ZH") : ?>
							<li> <a href="/privacy-policy">隐私政策</a></li>
							<li><a href="/refund-policy">退货政策</a></li>
							<li><a href="/terms_of_use">条款及细则</a></li>
						<?php endif ?>

						<?php if(qtranxf_getLanguage() == "zh") : ?>
							<li> <a href="/privacy-policy">私隱政策</a></li>
							<li> <a href="/refund-policy">退貨政策</a></li>
							<li> <a href="/terms_of_use">條款及細則</a></li>
						<?php endif ?>
					</ul>
					<ul class="fo-nav fonav-two">
						<?php if(qtranxf_getLanguage() == "en") : ?>
							<li><a href="mailto:info@bee4two.cn">Contact us</a></li>
						<?php endif ?>

						<?php if(qtranxf_getLanguage() == "ZH") : ?>
							<li><a href="mailto:info@bee4two.cn">联系我们</a></li>
						<?php endif ?>

						<?php if(qtranxf_getLanguage() == "zh") : ?>
							<li><a href="mailto:info@bee4two.cn">聯繫我們</a></li>
						<?php endif ?>
						<li><a href="mailto:info@bee4two.cn">info@bee4two.cn</a></li>
					</ul>
					<a href="#head" class="back-top"></a>
				</div>
			</div>
			<div class="fo-bottom"><p>Copyright © 2017 Bee4two. 深圳前海保保软件科技有限公司. 粤ICP备17041474号-1 </p></div>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo get_template_directory_uri();?>/assets/newweb/js/jquery.js"></script>
		<script src="<?php echo get_template_directory_uri();?>/assets/ztime/js/jquery.cookie.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo get_template_directory_uri();?>/assets/newweb/js/bootstrap.js"></script>
		
		<script>
			
			$(function(){
				$(".dropdown-menu").hide();
				$(".dropdown").hover(function() {
					$(".dropdown-menu").show();
				}, function() {
					$(".dropdown-menu").hide();
				});
				initScroll();
				bindLink();
			});
			
			/*初始滚动条位置*/
			function initScroll(){
				var current_scroll = $.cookie('current_scroll');
				if(current_scroll){
					console.info("location",current_scroll);
					$(document).scrollTop(current_scroll);
				}
				$.cookie('current_scroll', null, {path:"/"});
			}
			
			/*绑定切换语言click事件*/
			function bindLink(){
				var aArray = $("#menu-languagemenu ul.sub-menu a");
				$(aArray).each(function(index,ele){
					$(ele).data("link", $(ele).attr("href"));
					$(ele).attr("href", "javascript:;")

					$(ele).bind("click", function(){
						console.info($(this).data("link"));

						var current_scroll = $(document).scrollTop();
						console.info("save scroll", current_scroll);
						$.cookie('current_scroll', current_scroll, { expires: 1, path:"/"});
						
						window.location.href = $(this).data("link");
					});
				});
			}

		</script>
	</body>

</html>