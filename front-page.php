<?= get_header(); ?>

    <style>
        #myCarousel {
          --f-carousel-slide-height: 60%;
          --f-carousel-spacing: 10px;
          --f-carousel-slide-width: calc(100% / 3);
  
          height: 200px;
        }
  
        #myCarousel .f-carousel__slide {
          padding: 10px;
          background: #eee;
          /*width: calc(100% / 3);*/
        }

        #myCarousel .f-carousel__slide img {
            padding: 10px;
        }
      </style>
	  
    <div class="f-carousel" id="myCarousel">
        <div class="f-carousel__viewport">
            <div class="f-carousel__track">
				<?php
				function getTextSource($htmldoc) {
					$htmldom = new DOMDocument;
					@$htmldom->loadHTML($htmldoc);
					$texts = $htmldom->getElementsByTagName('div');
					foreach($texts as $text) {
						if($text->getAttribute('class') == 'site-wrapper') {
							$h1 = $text->getElementsByTagName('h1')->item(0);
							$text = $h1->nodeValue;
							return $text;
						}
					}
					return null;
				}

				function getImageSource($html) {
					$dom = new DOMDocument;
					@$dom->loadHTML($html);
					$divs = $dom->getElementsByTagName('div');
					foreach($divs as $div) {
						if($div->getAttribute('class') == 'swiper-slide') {
							$img = $div->getElementsByTagName('img')->item(0);
							$src = $img->getAttribute('src');
							return $src;
						}
					}
					return null;
				}

				// Retrieve ID Range from options
				$id_range_start = get_option('id_range_start', 2093); // default value is 10
				$id_range_end = get_option('id_range_end', 2100); // default value is 20


				for ($id = $id_range_start; $id <= $id_range_end; $id++) {
					$htmldoc = file_get_contents("https://www.klinisyen.com/index.php?route=product/product&product_id=$id");
					$html = file_get_contents("https://www.klinisyen.com/index.php?route=product/product&product_id=$id");
					$text = getTextSource($htmldoc);
					$src = getImageSource($html);
					if ($src !== null || $text !== null) {
						echo "<div class='f-carousel__slide'><div class='new-image'><img height='200' width='100%'  src='$src' /></div><h6>$text</h6></div>";
					}
				}
				?>
            </div>
        </div>
    </div>



    <script>
        const container = document.getElementById("myCarousel");
        const options = { axis: "x" };

        new Carousel(container, options);
    </script>



<?= get_footer(); ?>
