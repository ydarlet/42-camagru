<!-- <div class="subtitle" style="margin-top: 2em;">
    Camagru
</div> -->
<div style="display: flex; justify-content: flex-start; align-items: center; margin-top: -4vh;">
  <div style="width: 75vw; height: 79vh; margin-top: -3.2vh;">
    <?php
      include('includes/filtres.php');
    ?>
    <div style="padding: 2em; height: 58vh; overflow: scroll;">
      <video 
        id="video"
        autoplay="true"
        style="width: 500px; height: 375px; background-color: #666; border-radius: 0em;" 
        class=""
        >
      </video>
      <br/>
      <div 
        id="apercu"
        style="width: 500px; height: 375px; position: relative; margin: auto; margin-top: -378px; left: -2px; /*border: 1px solid blue;*/"
        >
        <img id="apercu_img" src="" style="max-height: 375px; max-width: 500px;"/>
      </div>
      <br/>
      <button id="startbutton" disabled>Prendre une photo</button>
      <br/>
      <!-- <button id="test" onClick="sendPost();">test_send_post</button> -->
      <!-- <br/> -->
      <canvas id="canvas" style="display:none;"></canvas>
      <br/>
      <img src="" id="photo" alt="photo" style="display:visible;">
      <!-- <br/><br/> -->
    </div>
    <?php
      if ((isset ($_POST['data'])) && ($_POST['data'] != NULL))
        echo 'Oui DATA !';
    ?>
  </div>
  <aside>
    <?php
      include('includes/mes_photos.php');
    ?>
  </aside>
</div>




<!-- <script>
	existeFiltre();
</script>

<a href="index.php?camagru=1&filtre=1">Prendre une photo</a> -->

<?php

	// -- ou bien juste envoyer la data en post ! au lieu de get ! et le nom du filtre

	// event listener a mettre sur tout ce qui change sur le body : onChange="..."
	// ou que sur filtres container
	// si qqchose change dedans, alors déclenche existe Filtre..etc

	// check si exsite un filtre selectionné
	// si oui afficher un lien
	// sinon afficher la même phrase sans lien

	// javascript écrit un lien avec filtre="nom du filtre" en variable get dans l'url
	// on clique sur le lien généré débloqué par le filtre cliqué
	// dans la future page, le code remarque le get
	// il déclenche le snapshot et son enregistrement directement dans php au lieu de javascript
?>

<script>
  (function() {

    var streaming = false,
        video        = document.querySelector('#video'),
        cover        = document.querySelector('#cover'),
        canvas       = document.querySelector('#canvas'),
      filtre		= document.querySelector('#apercu_img'),
        photo        = document.querySelector('#photo'),
        startbutton  = document.querySelector('#startbutton'),
        width = 500,
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
      canvas.getContext('2d').drawImage(filtre, (width - filtre.width) / 2, 0, filtre.width, filtre.height);

      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
    }

      // ajout pour envoyer une requete get
      function httpGet(theUrl)
    {
      // console.log(theUrl);
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
      xmlHttp.send( null );
      return xmlHttp.responseText;
    }

    function loadUrl(location)
    {
      this.document.location.href = location;
    }

    function createInstance()
    {
      var req = null;
      if(window.XMLHttpRequest) {
        req = new XMLHttpRequest();
      }
      else if (window.ActiveXObject) {
        try {
          req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
          try {
            req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("XHR not created");
              }
          }
        }
        return req;
    }

        function storing(data)
    {
        var element = document.getElementById('storage');
        element.innerHTML = data;
    }

    function postPic()
    {
      console.log("postPic() ------ start");
      var data = 'data=' + photo.getAttribute('src');
      console.log(data);
      var req =  createInstance();
      req.onreadystatechange = function()
      { 
        if(req.readyState == 4)
        {
                if(req.status != 200)
                  //storing(req.responseText);	
                //else	
                  alert("Error: returned status code " + req.status + " " + req.statusText);
        }
      }
      req.open("POST", "index.php?parametres=1", true); 
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      req.send(data);
      location.reload();
    }

    startbutton.addEventListener('click', function(ev){
        console.log('snap_pris');
      takepicture();
      postPic();


      // var xhr = new XMLHttpRequest();
      // xhr.open("POST", 'http://localhost/~yanndarlet/42/42-camagru/index.php?camagru=1', true);
      // xhr.setRequestHeader('Content-Type', 'application/json');
      // xhr.send(JSON.stringify({
      //     epsilon: 'delta'
      // }));

      // var xhr = new XMLHttpRequest();
      // xhr.open("POST", 'http://localhost/~yanndarlet/42/42-camagru/index.php?parametres=1', true);
      // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
      // xhr.send('someStuff');



      // var photo = document.getElementById('photo');
      // httpGet(window.location.href + '&snap=' + photo.src);
      // httpGet(window.location.href + '&snap=done');
      // loadUrl(window.location.href + '&snap=done');
      ev.preventDefault();
    }, false);

  })();
</script>