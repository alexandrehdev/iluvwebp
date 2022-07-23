let modal = document.getElementById('modal-box');
let file = document.getElementById('upload-image');
let closeButton = document.getElementById('close-button');


file.addEventListener('change',function(){
    modal.style.opacity = '1';
    modal.style.display = 'block';
    modal.style.transition = 'display 6s';
});

closeButton.onclick = function(){
    modal.style.display = 'none';
}

if(window.history.replaceState ){
	window.history.replaceState( null, null, window.location.href);
}

 
