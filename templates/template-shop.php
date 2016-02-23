<?php
/**
 *
 * Template Name: shop
 *
 * @package OnePage
 * @subpackage OnePage
 * @since OnePage 0.1
 * 
 */
?>

	<style type="text/css">
	/**
	 *	SHOP
	 */
	.shop{margin:0 auto; position:relative; width:90%;}
	/* Categories */
	.shop_categories{position:relative; text-align:center; transform:scale3d(1,1,1); transition: all .3s ease-out; width:100%;}
	.shop_category{display:inline-block; margin:30px 25px; max-width:260px; position:relative; text-decoration:none; transform:scale3d(1,1,1); transition: all .3s ease-out; width:25%;}
	.shop_category figure{align-items:center; display:flex; height:150px; justify-content:center; margin-bottom:15px; overflow:hidden; position:relative; transform:scale3d(1,1,1); transition: all .3s ease-out; width:100%;}
	.shop_category img{flex-shrink:0; min-height:100%; min-width:100%;}
	.shop_category h3{color:#000; font:400 24px Cinzel; margin:0; padding:15px;}
	.shop_category:hover h3{border:1px solid #040404; padding:14px;}

	/* Items */
	.shop_items{display:none; float:left; padding-left:4%; position:relative; text-align:center; width:85%;}
	.shop_item{cursor:pointer; display:block; float:left; height:0; margin:0; opacity:0; overflow:hidden; position:relative; transform:scale3d(1,1,1); transition:all .5s ease-in-out; width:180px;}
	.shop_item_desc{display:none; opacity:0; position:relative;}
	.slideItem{clear:both; display:none; position:relative; width:100%;}
	.shop_item_content{position:relative;}
	.shop_item_content > *{opacity:0; position:relative; transform:scale3d(1,1,1); transition: all .3s ease-out; z-index:1;}
	.shop_item figure{position:relative;}
	.shop_item img{ottom:0; height:auto; left:0; margin:auto; max-width:100%; min-height:100%; position:absolute; right:0; top:0; z-index:0;}

	.shop_item h4{font:400 14px Cinzel;}
	.shop_item .price{font:400 24px Museo;}
	.shop_item_text{padding-top:15%; width:100%;}

	.shop_item:hover .shop_item_content > *{opacity:1;}
	.shop_item:hover .shop_item_desc{opacity:0;}

	/* Categories open - Categories */
	.catOpen .shop_categories{float:left; width:15%;}
	.catOpen .shop_category{margin:0 0 30px; width:100%;}
	.catOpen .shop_category figure{opacity:0.3; margin:0;}
	.catOpen .shop_category h3{bottom:0; font-size:14px; left:0; padding:14px; position:absolute; top:0; right:0;}

	.catOpen .shop_category:hover h3{border:1px solid #040404; bottom:0; font-size:14px; left:0; padding:14px; position:absolute; top:0; right:0;}
	.catOpen .shop_category:hover figure,
	.catOpen .shop_category.active figure{opacity:1;}

	/* Categories open - Items */
	.catOpen .shop_items{display:block;}
	.catOpen .shop_item.active{display:table; height:140px; margin:0 25px 30px 0; opacity:1;}
	.catOpen .shop_item_content > figure{opacity:1; width:100%;}

	.catOpen .shop_item:hover figure{opacity:.4;}

	/* Item open */
	.itemOpen .shop_item{display:none;}
	.itemOpen .shop_item.active{cursor:default; display:table; height:auto; margin:0; overflow:visible; width:100%;}
	.itemOpen .shop_item.active .shop_item_content{display:flex;}
	.itemOpen .shop_item.active .shop_item_content > *{padding:0; opacity:1;}
	.itemOpen .shop_item.active .shop_item_text{float:left; width:38%;}

	
	.itemOpen .shop_item_content{background-color:#fff; margin:0; padding:0; position:relative; width:100%;}

	.itemOpen .shop_item_content > figure{float:left; margin:0 2% 0 0; min-width:0; width:60%;}
	.itemOpen .shop_item img{max-width:100%; position:relative; width:100%;}
	.itemOpen .shop_item_desc{display:block; opacity:1; text-align:left;}
	.itemOpen .shop_item h4{font-size:24px; margin:35px auto 45px;}
	.itemOpen .price{bottom:2%; position:absolute; left:2%;}
	.itemOpen .shop_item:hover img,
	.itemOpen .shop_item:hover .shop_item_desc{opacity:1;}
	.itemOpen .shop_item:hover .shop_item_content{border:none;}


	.itemOpen .slideItem{display:table-row; padding-top:20px;}
	.itemOpen .slideItem > div{background-color:#fff; cursor:pointer; float:left; height:120px; opacity:0.4; overflow:hidden; position:relative; transform:scale3d(1,1,1); transition:all .3s ease; width:20%;}
	.itemOpen .slideItem .img{bottom:0; left:0; margin:auto; position:absolute; right:0; top:0;}

	.itemOpen .slideItem > div:hover,
	.itemOpen .slideItem > div.active{opacity:1;}

	</style>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>


<div class="shop">
	<h1>Nos produits</h1>

	<div class="shop_categories">
		<?php
		$prod_categories = get_terms( 'product_cat', array(
		        'orderby'    => 'name',
		        'order'      => 'ASC',
		        'hide_empty' => true
		    ));

		    foreach( $prod_categories as $prod_cat ) :
		        $thumbnail_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
				$href = get_term_link($prod_cat->slug, 'product_cat');
				echo '<a href="#" class="shop_category" data-cat_id="'. $prod_cat->term_id .'"><figure><img src="'. $image[0] .'" alt="'. $prod_cat->name .'" /></figure><h3>'. $prod_cat->name .'</h3></a>';
		    endforeach; 
		    wp_reset_query();
		?>
	</div>

	<div class="shop_items">
		<?php  
		$args = array( 'post_type' => 'product' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
			global $product; 

			// Get all categories of the product
			$categories = get_the_terms( $product->ID, 'product_cat' );
		 	$cat_id = '';
			foreach ($categories as $value)
				$cat_id .= $value->term_id .' ';


			$content = '<div class="shop_item" data-cat_id="'. $cat_id .'">';
			$content .= 	'<div class="shop_item_content">';
			$content .= 		'<figure>';
			$content .= 			$product->get_image('large') ;
			$content .= 		'</figure>';
			$content .= 		'<div class="shop_item_text">';
			$content .= 			'<h4>'. get_the_title() .'</h4>';
			$content .= 			'<div class="shop_item_desc">';
			$content .= 				'<p>This is Photoshop\'s version  of LorThis is Photoshop\'s version  of Lorem Ipsum. <br />Proin gravida nibh vel velit auctor aliquet.</p>';
			$content .= 				'<p>This is Photoshop\'s version  of LorThis is Photoshop\'s version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>';
			$content .= 			'</div>';
			$content .= 			'<p class="price"'. $product->get_price_html() .'</p>';
			$content .= 		'</div>';
			$content .= 	'</div>';
			$content .= 	'<div class="slideItem">';
			$content .= 	'<br class="clear" />';
			$attachment_ids = $product->get_gallery_attachment_ids();
			foreach( $attachment_ids as $key => $attachment_id ){
				($key == 0) ? $classActive = 'class="active"' : $classActive = '';
				$content .= '<div '.$classActive.'>'.wp_get_attachment_image( $attachment_id, 'medium' ) .'</div>';
			}
			$content .= 	'</div>';
			$content .= '</div>';
			echo $content;

		endwhile; 
		wp_reset_query(); 
		?>
	</div>
</div>
<br class="clear" />






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
'use strict';

$(document).ready(function(){
	/* Open Categories */
	$(".shop_category").on("click", function(){
		// Define active category
		$(this).siblings().removeClass("active");
		$(this).parents(".shop").addClass("catOpen").removeClass("itemOpen");
		$(this).addClass("active");

		// Define items to show/hide
		var cat_id = ($(this).data('cat_id')).toString();
		$('.shop_item').each(function(){
			var $this = $(this);
			var dataArray = $this.data('cat_id').split(' ');

			if( $this.hasClass('active') ){
				if(dataArray.indexOf(cat_id) == -1){
					setTimeout(function() { $this.removeClass('active'); }, 10);
				}
				return true;
			}

			$this.removeClass('active');

			if(dataArray.indexOf(cat_id) > -1){
				$this.addClass('active');
			}			
		});

		return false;
	});

	/* Open Items */
	$(".shop_item").on("click", function(){
		$(this).siblings().removeClass("active");
			$(this).parents(".shop").addClass("itemOpen");
		$(this).addClass("active");
	});

	/* Open sub items pictures */
	$('.slideItem > div').on("click", function(){
		var imgActive = $(this).children('img').clone(); //.children('img').html();
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		
		var imgPath = $(this).parents('.shop_item').find('.shop_item_content');
		imgPath.children('figure').html( $(imgActive).fadeIn(300) );
/*		imgPath.children('figure').children('img').prepend( $(imgActive).fadeIn(300) );
*/	});
});



</script>


