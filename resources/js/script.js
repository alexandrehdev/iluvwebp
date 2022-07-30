let modal = document.getElementById('modal-box');
let file = document.getElementById('upload-image');
let closeButton = document.getElementById('close-button');
let labelImage = document.getElementById('label-image');

let imageName = document.getElementById('image-name');
let imageSize = document.getElementById('image-size');

labelImage.addEventListener('click',function(){
  file.value = '';
});

file.addEventListener('change',function(){
    imageName.innerHTML = imageName.textContent + file.files[0]['name'];
    imageSize.innerHTML = imageSize.textContent + file.files[0]['size'];

    modal.style.opacity = '1';
    modal.style.display = 'flex';
    modal.style.transition = '1s';
    modal.style.pointerEvents = 'all';
    modal.style.marginTop = '0px';
});

closeButton.onclick = function(){
    modal.style.opacity = '0';
    modal.style.pointerEvents = 'none';
}

if(window.history.replaceState ){
	window.history.replaceState( null, null, window.location.href);
}

                              
