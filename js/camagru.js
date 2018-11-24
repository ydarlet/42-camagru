/* reformater le code pour que chaque fois ca check si il y a au moins
 une erreur alors on desactive le bouton
 car pour linstant ca bogue : si on a des erreurs et quon rempli
  un champ ok il reactive le bouton donc pas cool. */

function verif_validate_button() {
    var username_icn = document.getElementById('inscri-uname-icn');
    var email_icn = document.getElementById('inscri-email-icn');
    var password_icn = document.getElementById('inscri-password-icn');
    var pass2_icn = document.getElementById('inscri-password2-icn');
    var validate = document.getElementById('inscription-validate');

    console.debug('-----');
    console.debug('function validate button :');

    if (username_icn.style.visibility == 'visible'
        || email_icn.style.visibility == 'visible'
        || password_icn.style.visibility == 'visible'
        || pass2_icn.style.visibility == 'visible')
    {
        if (username_icn.src == 'img/icn/cross.png'
            || email_icn.src == 'img/icn/cross.png'
            || password_icn.src == 'img/icn/cross.png'
            || pass2_icn.src == 'img/icn/cross.png')
        {
            console.debug('false');
            validate.disabled = true;
            validate.value = 'erreurs dans le form';
            return (false);
        }
    }
    console.debug('true');
    validate.disabled = false;
    validate.value = 'inscription';
    return (true);
}

function verif_username() {
    var validate = document.getElementById('inscription-validate');
    var icn = document.getElementById('inscri-uname-icn');
    var username = document.getElementById('inscription-username');
    var username_alert = document.getElementById('inscri-uname-description');
    console.debug('***********************************************');
    console.debug('username');
    console.debug(username.value);
    if (!/^[A-Za-z][A-Za-z0-9]{5,31}$/.test(username.value)) {
        console.debug('Matche pas le REGEX');
        username.className = 'input_text red red-border red-bg';
        validate.disabled = true;
        validate.value = 'erreurs dans le form';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/cross.png';
        username_alert.className = 'notice red';
    }  
    else {
        console.debug('OK');
        username.className = 'input_text green green-border green-bg';
        validate.disabled = false;
        validate.value = 'inscription';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/tick.png';
        username_alert.className = 'notice red invisible';
    }
    verif_validate_button();
}

function verif_email() {
    var validate = document.getElementById('inscription-validate');
    var icn = document.getElementById('inscri-email-icn');
    var email = document.getElementById('inscription-email');
    var email_alert = document.getElementById('inscri-email-description');
    console.debug('***********************************************');
    console.debug('email');
    console.debug(email.value);
    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
        console.debug('Matche pas le REGEX');
        email.className = 'input_text red red-border red-bg';
        validate.disabled = true;
        validate.value = 'erreurs dans le form';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/cross.png';
        email_alert.className = 'notice red';
    }  
    else {
        console.debug('OK');
        email.className = 'input_text green green-border green-bg';
        validate.disabled = false;
        validate.value = 'inscription';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/tick.png';
        email_alert.className = 'notice red invisible';
    }
    verif_validate_button();
}

function verif_pass2() {
    var validate = document.getElementById('inscription-validate');
    var icn = document.getElementById('inscri-password2-icn');
    var password = document.getElementById('inscription-password');
    var password_confirm = document.getElementById('inscription-password_confirm');
    var pass2_alert = document.getElementById('inscri-password2-description');
    console.debug('***********************************************');
    console.debug('password');
    console.debug(password.value);
    console.debug('password_confirm');
    console.debug(password_confirm.value);
    if (password.value != password_confirm.value) {
        console.debug('PAS LES MEME');
        password_confirm.className = 'input_text red red-border red-bg';
        validate.disabled = true;
        validate.value = 'erreurs dans le form';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/cross.png';
        pass2_alert.className = 'notice red';
    }
    else {
        console.debug('OK');
        password_confirm.className = 'input_text green green-border green-bg';
        validate.disabled = false;
        validate.value = 'inscription';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/tick.png';
        pass2_alert.className = 'notice red invisible';
    }
    verif_validate_button();
}

function verif_password() {
    var validate = document.getElementById('inscription-validate');
    var icn = document.getElementById('inscri-password-icn');
    var password = document.getElementById('inscription-password');
    var pass_alert = document.getElementById('inscri-password-description');
    console.debug('***********************************************');
    console.debug('password');
    console.debug(password.value);
    if (!/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{7,19}$/.test(password.value)) {
        console.debug('Matche pas le REGEX');
        password.className = 'input_text red red-border red-bg';
        validate.disabled = true;
        validate.value = 'erreurs dans le form';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/cross.png';
        pass_alert.className = 'notice red';
    }  
    else {
        console.debug('OK');
        password.className = 'input_text green green-border green-bg';
        validate.disabled = false;
        validate.value = 'inscription';
        icn.style.visibility = 'visible';
        icn.src = 'img/icn/tick.png';
        pass_alert.className = 'notice red invisible';
    }
    verif_pass2();
    verif_validate_button();
}



// ANCIENNE FONCTION (du bouton Snap) FILTRE
// function addFiltre(e) {
//     /*
//         Change (Toggle) la classe de l'image du filtre pour montrer visuellement la selection
//         Active le bouton de snap si un filtre est activé
//         Désactive le bouton de snap si aucun filtre n'est activé
//      */
//     console.log(e.id);
//     var elem = document.getElementById(e.id);
//     var snap_button = document.getElementById('startbutton');
//     if (elem.className == 'filtre_img filtre_selected') {
//         elem.className = 'filtre_img';
//         snap_button.disabled = true;
//         // --> supprimer l'apercu
//         var apercu = document.getElementById("apercu_img");
//         apercu.src = "";
//     } else {
//         // --> desactiver tous les autres boutons d'abord
//         var regex = /^filtre/;
//         var tous = document.getElementById("filtres").getElementsByTagName("*");
//         for (i in tous) {
//             if (regex.test(tous[i].id)) {
//                 tous[i].className = 'filtre_img';
//             }
//         }
//         elem.className = 'filtre_img filtre_selected';
//         snap_button.disabled = false;
//         // --> afficher l'apercu sur la prise de vue camera
//         var apercu = document.getElementById("apercu_img");
//         apercu.src = "./img/filtres/" + e.name;
//     }
// }

function addFiltre(e) {
    /*
        Change (Toggle) la classe de l'image du filtre pour montrer visuellement la selection
        Active le bouton de snap si un filtre est activé
        Désactive le bouton de snap si aucun filtre n'est activé
     */
    console.log(e.id);
    var elem = document.getElementById(e.id);
    var snap_button = document.getElementById('startbutton');
    if (elem.className == 'filtre_img filtre_selected') {
        elem.className = 'filtre_img';
        snap_button.disabled = true;
        // --> supprimer l'apercu
        var apercu = document.getElementById("apercu_img");
        apercu.src = "";
    } else {
        // --> desactiver tous les autres boutons d'abord
        var regex = /^filtre/;
        var tous = document.getElementById("filtres").getElementsByTagName("*");
        for (i in tous) {
            if (regex.test(tous[i].id)) {
                tous[i].className = 'filtre_img';
            }
        }
        elem.className = 'filtre_img filtre_selected';
        snap_button.disabled = false;
        // --> afficher l'apercu sur la prise de vue camera
        var apercu = document.getElementById("apercu_img");
        apercu.src = "./img/filtres/" + e.name;
    }
}

//pas testée je crois ?
function existeFiltre() {
    var regex = /^filtre/;
    var tous = document.getElementById("filtres").getElementsByTagName("*");
    for (i in tous) {
        if (tous[i].className = 'filtre_img filtre_selected') {
            console.log('un filtre est selectionné');
            return true;
        }
    }
    console.log('aucun filtre de selectionné');
    return false;
}

// send Post test 1
function sendPost() {
    console.log('SendPost');
    // var newName = 'John Smith',
    //     xhr = new XMLHttpRequest();

    // xhr.open('POST', 'index.php?camagru=1&id=some-unique-id');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.onload = function() {
    //     if (xhr.status === 200 && xhr.responseText !== newName) {
    //         alert('Something went wrong.  Name is now ' + xhr.responseText);
    //     }
    //     else if (xhr.status !== 200) {
    //         alert('Request failed.  Returned status of ' + xhr.status);
    //     }
    // };
    // xhr.send(encodeURI('name=' + newName));

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/server', true);

    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() { // Call a function when the state changes.
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Request finished. Do processing here.
        }
    }
    xhr.send("foo=bar&lorem=ipsum"); 
    // xhr.send(new Blob()); 
    // xhr.send(new Int8Array()); 
    // xhr.send(document);
}

// function deleteSnap(file_name) {
//     console.log(file_name);
//     var r = confirm("Are you sure you want to delete this Image?")
//     if(r == true)
//     {
//         $.ajax({
//           url: './lib/delete.php',
//           data: {'file' : "<?php echo dirname(__FILE__) . '/galerie/'?>" + file_name },
//           success: function (response) {
//              // do something
//              alert('file deleted');
//           },
//           error: function () {
//              // do something
//              alert('error');
//           }
//         });
//     }
// }


function snapshot() {
    console.log('Snap Snap');
    // TROUVER L'URL DE L'IMAGE FILTRE A RAJOUTER A LA CAMERA
    var tous = document.getElementById("filtres").getElementsByTagName("*");
    for (i in tous) {
        if (tous[i].className == 'filtre_img filtre_selected') {
            filtre = tous[i].name;
            console.log(filtre);
        }
    }
    // ACQUERIR L'IMAGE DEPUIS LA WEBCAM
    // 1. Obtenir une référence sur l’élément <video>
    var player = document.querySelector('#videoElement');
    
    // 2. Créer un canevas aux dimensions de la vidéo
    var canvas = document.createElement('canvas');
    canvas.width = player.width;
    canvas.height = player.height;
    
    // 3. Obtenir le contexte de dessin du canevas
    var cx = canvas.getContext('2d');
    
    // 4. Capturer l’image actuelle de la vidéo
    cx.drawImage(player, 0, 0, canvas.width, canvas.height);
    
    // 5. Convertir l’image capturée en fichier, et créer un lien vers ce fichier
    // canvas.toBlob(function (blob) {

    //     // var binaryData = [];
    //     // binaryData.push(cx);
    //     // var href = window.URL.createObjectURL(new Blob(binaryData, {type: "image/png"}))

    //     var a = document.createElement('a');
    //     a.href = URL.createObjectURL(blob);
    //     // a.href = href;
    //     a.target = '_blank';
    //     a.textContent = 'Voir l’image capturée';
    //     document.body.appendChild(a);
    // });

    // Depuis l'exemple de MDN
    // var data = canvas.toDataURL('image/png');
    // console.log('data: ' + data);
    // photo = document.querySelector('#photo_img'),
    // photo.setAttribute('src', data);


    //Autre exemple MDN avec toBlob
    // var canvas = document.getElementById('canvas');

    canvas.toBlob(function(blob) {
    var newImg = document.createElement('img'),
        url = URL.createObjectURL(blob);

    newImg.onload = function() {
        // no longer need to read the blob so it's revoked
        URL.revokeObjectURL(url);
    };

    newImg.src = url;
    document.body.appendChild(newImg);
    });


    // envoyer le tout au script php pour qu'il le traite
    // recharger le page
}