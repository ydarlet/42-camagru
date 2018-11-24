<?php
	include('includes/filtres.php');
	include('includes/mes_photos.php');
    echo '<div class="fs2 mt3 mb2">Camagru</div>' ;
?>
<div 
	id="container" 
	style="margin: 0px auto; width: 500px; height: 375px; border: 1px #333 solid;" 
	class="arrondi"
>
    <video 
		autoplay="true" 
		id="videoElement" 
		style="width: 500px; height: 375px; background-color: #666;" 
		class="arrondi"
	>
    </video>
	<div 
		id="apercu"
		style="width: 500px; height: 375px; position: absolute; margin: auto; margin-top: -380px; border: 1px solid blue;"
	>
		<img id="apercu_img" src="" style="max-height: 300px; max-width: 300px;"/>
	</div>
	<canvas id="canvas"></canvas>
	<div 
		id="photo"
		style="width: 500px; height: 375px; position: absolute; margin: auto; margin-top: 8em; border: 1px solid pink;"	
	>
		<img id="photo_img" src="http://placekitten.com/g/320/261" />
	</div>
</div>
<button
	id="snap_button"
	style="margin-top: 3em; width: 10em; height: 3em; border-radius: 11px; border: 1px solid white;"
	disabled
>	
	SNAPSHOT
</button>
<br/>
<!--
<input type="button" value="Capture" onclick="capture()"/><br/><br/>
<canvas id="canvas" width="500" height="500"></canvas>
-->
<!--
<button id="capture">Capture</button>
<div id="output"></div>
-->

<br/><br/><br/><br/><br/>

<script>
	// Avant c'était ca le code qui était super pour faire marcher la video dans la page remplacé par le code du haut de MDN
    // var video = document.querySelector("#videoElement");
    
    // navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    
    // if (navigator.getUserMedia) {       
    //     navigator.getUserMedia({video: true}, handleVideo, videoError);
    // }
    
    // function handleVideo(stream) {
    //     video.src = window.URL.createObjectURL(stream);
    // }
    
    // function videoError(e) {
    //     // do something
    // }

    /*function capture() {
        var canvas = document.getElementById("canvas");
        var video = document.getElementById("videoElement");
        
        if (video.paused) {
            canvas.getContext('2d').drawImage(video, 0, 0);
        }
    }*/

/*
    (function() {
        "use strict";
    
        var video, $output;
        var scale = 0.25;
    
        var initialize = function() {
            $output = $("#output");
            video = $("#videoElement").get(0);
            $("#capture").click(captureImage);                
        };
    
        var captureImage = function() {
            var canvas = document.createElement("canvas");
            canvas.width = video.videoWidth * scale;
            canvas.height = video.videoHeight * scale;
            canvas.getContext('2d')
                .drawImage(video, 0, 0, canvas.width, canvas.height);
    
            var img = document.createElement("img");
            img.src = canvas.toDataURL();
            $output.prepend(img);
        };
    
        $(initialize);            
    
    }());
*/

 </script>

<!--
<video id="video" autoplay></video>
<button id="snap">Capture</button>
<button id="new">New</button>
<canvas id="canvas" width="640" height="480" style="border:1px solid black;"></canvas>
<button id="upload">Upload</button>

<script>
	// Put event listeners into place
	window.addEventListener("DOMContentLoaded", function() {
	// Grab elements, create settings, etc.
	var canvas = document.getElementById("canvas"),
	context = canvas.getContext("2d"),
	video = document.getElementById("video"),
	videoObj = { "video": true },
	errBack = function(error) {
		console.log("Video capture error: ", error.code); 
	};
	// Put video listeners into place
	if(navigator.getUserMedia) { // Standard
		navigator.getUserMedia(videoObj, function(stream) {
			video.src = stream;
			video.play();
		}, errBack);
		} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
		navigator.webkitGetUserMedia(videoObj, function(stream){
			video.src = window.webkitURL.createObjectURL(stream);
			video.play();
		}, errBack);
		} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
		navigator.mozGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
		}, errBack);
	}
	// Trigger photo take
	document.getElementById("snap").addEventListener("click", function() {
		context.drawImage(video, 0, 0, 640, 480);
		// Littel effects
		$('#video').fadeOut('slow');
		$('#canvas').fadeIn('slow');
		$('#snap').hide();
		$('#new').show();
		// Allso show upload button
		//$('#upload').show();
	});
	// Capture New Photo
	document.getElementById("new").addEventListener("click", function() {
		$('#video').fadeIn('slow');
		$('#canvas').fadeOut('slow');
		$('#snap').show();
		$('#new').hide();
	});
	// Upload image to sever 
	document.getElementById("upload").addEventListener("click", function(){
		var dataUrl = canvas.toDataURL();
		$.ajax({
			type: "POST",
			url: "camsave.php",
			data: { 
				imgBase64: dataUrl
			}
			}).done(function(msg) {
			console.log('saved');
			// Do Any thing you want
		});
	});
}, false);
</script>
-->


<script>
(function() {

  var streaming = false,
      video        = document.querySelector('#videoElement'),
      cover        = document.querySelector('#cover'),
      canvas       = document.querySelector('#canvas'),
      photo        = document.querySelector('#photo_img'),
      startbutton  = document.querySelector('#snap_button'),
      width = 320,
      height = 0;

  navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

  navigator.getMedia(
    {
      video: true,
      audio: false
    },
    function(stream) {
      if (navigator.mozGetUserMedia) {
        video.mozSrcObject = stream;
      } else {
        var vendorURL = window.URL || window.webkitURL;
        video.src = vendorURL.createObjectURL(stream);
      }
      video.play();
    },
    function(err) {
      console.log("An error occured! " + err);
    }
  );

  video.addEventListener('canplay', function(ev){
    if (!streaming) {
      height = video.videoHeight / (video.videoWidth/width);
      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);
      streaming = true;
    }
  }, false);

  function takepicture() {
    canvas.width = width;
    canvas.height = height;
    canvas.getContext('2d').drawImage(video, 0, 0, width, height);
    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }

  startbutton.addEventListener('click', function(ev){
      takepicture();
    ev.preventDefault();
  }, false);

})();
</script>