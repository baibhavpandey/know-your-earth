<html>
<head>
<title>Know Your Earth</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/page_info.css';?>">

<script type="text/javascript">
        var can, ctx,
            minVal, maxVal,
            xScalar, yScalar,
            numSamples, y;
        // data sets -- set literally or obtain from an ajax call
        var dataName = [  "2010", "2011", "2012", "2013" ];
        var dataValue = [  21.8 , 19.5 , 19.5 , 18.4 ];
 
        function init() {
            // set these values for your data
            numSamples = 4;
            maxVal = 25;
            var stepSize = 1.5;
            var colHead = 50;
            var rowHead = 60;
            var margin = 10;
            var header = "temp"
            can = document.getElementById("can");
            ctx = can.getContext("2d");
            ctx.fillStyle = "black"
            yScalar = (can.height - colHead - margin) / (maxVal);
            xScalar = (can.width - rowHead) / (numSamples + 1);
            ctx.strokeStyle = "rgba(128,128,255, 0.5)"; // light blue line
            ctx.beginPath();
            // print  column header
            ctx.font = "14pt Helvetica"
            ctx.fillText(header, 0, colHead - margin);
            // print row header and draw horizontal grid lines
            ctx.font = "12pt Helvetica"
            var count =  0;
            for (scale = maxVal; scale >= 0; scale -= stepSize) {
                y = colHead + (yScalar * count * stepSize);
                ctx.fillText(scale, margin,y + margin);
                ctx.moveTo(rowHead, y)
                ctx.lineTo(can.width, y)
                count++;
            }
            ctx.stroke();
            // label samples
            ctx.font = "14pt Helvetica";
            ctx.textBaseline = "bottom";
            for (i = 0; i < 4; i++) {
                calcY(dataValue[i]);
                ctx.fillText(dataName[i], xScalar * (i + 1), y - margin);
            }
            // set a color and a shadow
            ctx.fillStyle = "green";
            //ctx.shadowColor = 'rgba(128,128,128, 0.5)';
            ctx.shadowOffsetX = 20;
            ctx.shadowOffsetY = 1;
            // translate to bottom of graph and scale x,y to match data
            ctx.translate(0, can.height - margin);
            ctx.scale(xScalar, -1 * yScalar);
            // draw bars
            for (i = 0; i < 4; i++) {
                ctx.fillRect(i + 1, 0, 0.5, dataValue[i]);
            }
        }
 
        function calcY(value) {
            y = can.height - value * yScalar;
        }
    </script>

</head>
<body onload="init()">
<img src="../images/kn2.png" width="1160px">
<div class="menu">
<ul>
	<li><a href="index.html">Home</a></li>
<li><a href="#">Company</a></li>
<li><a href="#">Products</a></li>
<li><a href="#">Aftersale</a></li>
<li><a href="contact/contact.html">News</a></li>
<li><a href="#">Contact</a></li>
</ul>
</div>
<div class="description">
	<h2>Temperature Information</h2>
	<p style="align:justify; "><?php
			$this->load->module('more_info');
			$this->more_info->get_description();
		?></p>
		<p><?php
			$this->load->module('more_info');
			$this->more_info->get_vege_desc();
		?></p>
</div>
<div class="graphics">
	<h2>bar graph of temperature of last four years</h2>
        <canvas id="can" height="500" width="400">
        </canvas>
</div>
<img src="../images/footer2.png" width="1160px">
</body>
</html>