const layer = document.querySelector('.layer');

function parallax(e){
	layer.style.transform = 'translate(' + e.clientX/75 + 'px, ' + e.clientY/150 + 'px)';

}

document.addEventListener('mousemove', parallax);


/*
document.addEventListener('scroll', function(){
	let offset = window.pageYOffset;
	layer.style.backgroundPositionY = (offset -  layer.offsetTop) * 0.7 + 'px';


});

*/
$('.images').scroll(function(){
	if(this.scrollTop == 0){
		$(this).removeClass().addClass('images');
	} 
	else if(this.scrollTop == 419){
		$(this).removeClass().addClass('images-2')
	}
	else{
		$(this).removeClass().addClass('images-3')
	}
})


$(document).ready(function(){
	 $('.slider').slick();});