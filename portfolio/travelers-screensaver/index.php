<?php 
    // Before we do anything, we need to initialize a bunch of stuff: namely, 
    // universal constants (for ease of access) and a database connection.
    require_once("../../private/initialize.php");
?>
<?php
    // Page Metadata
	$SLUG = "travelers-screensaver";
?>
<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-head/index.php"); ?>
		
		<main>
            <canvas id="c"></canvas>
            <script type="text/javascript">
                var c = document.getElementById("c");
                var ctx = c.getContext("2d");

                c.height = $('body').height()*2;
                c.width = $('main').width();

                font_size = 40;
                count_x = Math.floor(c.width / font_size) + 1;
                count_y = Math.floor(c.height / font_size) + 1;
                num_characters = count_x * count_y;
                offset_x = -font_size * 0.25;//font_size / 2;
                offset_y = font_size * 0.75;

                let randomThreshold = 100 / 10000.0;
                let transitionDuration = 25.0;

                let rgb = "255, 192, 0";
                let rgb2 = "255, 200, 0";
                let rgb3 = "192, 255, 0";

                alphanumerics = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

                // Initialize the array of text.
                characters = new Array(num_characters);
                for(var i = 0; i < num_characters; i++)
                {
                    charTransform = new Map();
                    charTransform.set('prevChar', alphanumerics[Math.floor(Math.random()*36)]);
                    charTransform.set('nextChar', "");
                    charTransform.set('transform', 0);

                    characters[i] = charTransform;
                }

                function randomizeText()
                {
                    for (var i = 0; i < characters.length; i++)
                    {
                        if(characters[i].get('nextChar') == "")
                        {
                            if(Math.random() < randomThreshold)
                            {
                                characters[i].set('nextChar', alphanumerics[Math.floor(Math.random()*36)]);
                                characters[i].set('transform', transitionDuration - 1);
                            }
                        }
                    }
                }
                function draw()
                {
                    ctx.fillStyle = "rgba(1, 0, 0, 1)";
                    ctx.fillRect(0, 0, c.width, c.height);

                    ctx.font = font_size + "px Travelers";

                    randomizeText();
                    for(var el = 0; el < characters.length; el++)
                    {
                        prev = characters[el].get('prevChar');
                        next = characters[el].get('nextChar');
                        tran = characters[el].get('transform');

                        if(next == "")
                        {
                            ctx.fillStyle = "rgba(" + rgb + ", 1)"; // Orange text
                            ctx.fillText(prev, offset_x + (el % count_x) * font_size, offset_y + Math.floor(el / count_x) * font_size);
                        }else
                        {
                            opacity = (transitionDuration - tran) / transitionDuration;

                            ctx.fillStyle = "rgba(" + rgb2 + ", " + opacity + ")"
                            ctx.fillText(next, offset_x + (el % count_x) * font_size, offset_y + Math.floor(el / count_x) * font_size);

                            ctx.fillStyle = "rgba(" + rgb2 + ", " + (1.0 - opacity) + ")"
                            ctx.fillText(prev, offset_x + (el % count_x) * font_size, offset_y + Math.floor(el / count_x) * font_size);

                            characters[el].set('transform', tran - 1);

                            if(characters[el].get('transform') == 0)
                            {
                                characters[el].set('prevChar', next);
                                characters[el].set('nextChar', "");
                            }
                        }
                    }
                }

                setInterval(draw, 10);
            </script>
		</main>

<?php require_once(DOC_PREFIX . SHARED_PATH . "/public-foot/index.php"); ?>