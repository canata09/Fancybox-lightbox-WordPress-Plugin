<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css" />
    <style>
        #myCarousel {
          --f-carousel-slide-height: 60%;
          --f-carousel-spacing: 10px;
          --f-carousel-slide-width: calc(100% / 8);
  
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
</head>
<body>

    <div class="f-carousel" id="myCarousel">
        <div class="f-carousel__viewport">
            <div class="f-carousel__track">
				<?php
				function getImageSource($html) {
					$dom = new DOMDocument;
					@$dom->loadHTML($html);
					$divs = $dom->getElementsByTagName('div');
					foreach($divs as $div) {
						if($div->getAttribute('class') == 'site-wrapper') {
							$h1 = $div->getElementsByTagName('h1')->item(0);
							$text = $h1->nodeValue;
							return $text;
						}
					}
					return null;
				}

				for ($id = 2093; $id <= 2100; $id++) {
					$html = file_get_contents("https://www.klinisyen.com/index.php?route=product/product&product_id=$id");
					$text = getImageSource($html);
					if ($text !== null) {
						echo "<h1>$text</h1>";
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
</body>
</html>