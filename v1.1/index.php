
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css"
          />
    <style>
        #myCarousel {
          --f-carousel-slide-height: 60%;
          --f-carousel-spacing: 10px;
          --f-carousel-slide-width: calc(100% / 9);
  
          height: 380px;
        }
  
        #myCarousel .f-carousel__slide {
          padding: 10px;
          background: #eee;
		  height: 340px;
          width: calc(100% / 9);
        }

        #myCarousel .f-carousel__slide .new-image {
            padding: 10px;
			height: 200px;
			background: #fff;
        }
        #myCarousel .f-carousel__slide h1 {
			height: 100px;
            padding: 10px;
			background: #fff;
        }
      </style>
  </head>
  <body>
    <div>
      <div class="f-carousel" id="myCarousel">
	  
	  
				<?php
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

				for ($id = 2093; $id <= 2100; $id++) {
					$html = file_get_contents("https://www.klinisyen.com/index.php?route=product/product&product_id=$id");
					$src = getImageSource($html);
					if ($src !== null) {
						echo "<div class='f-carousel__slide'><div class='new-image'><img height='200' width='100%'  src='$src' /></div><h1>1</h1></div>";
					}
				}
				?>
	  
	  
	 
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
    <script>
        const container = document.getElementById("myCarousel");
        const options = { axis: "x" };

        new Carousel(container, options);
    </script>
  </body>
</html>






