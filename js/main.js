console.log('maker space')


var links = document.querySelectorAll('a')
links.forEach((link) => {
  link.addEventListener('click', () => {
    console.log("forEach worked");
    //scrollTo(link)
    const id = link.href.split('#')[1];
    console.log(id)
    console.log(document.getElementById(id))
    if(document.getElementById(id)){
    	var destination = document.getElementById(id);
    	console.log('dest=' +destination);
    	console.log(destination.getBoundingClientRect().top);
    	scrollToSmoothly(destination.getBoundingClientRect().top);
    }
  });
});


//https://stackoverflow.com/questions/51229742/javascript-window-scroll-behavior-smooth-not-working-in-safari
function scrollToSmoothly(pos, time) {
	console.log(pos)
    var currentPos = window.pageYOffset;
    var start = null;
    if(time == null) time = 500;
    pos = +pos, time = +time;
    window.requestAnimationFrame(function step(currentTime) {
        start = !start ? currentTime : start;
        var progress = currentTime - start;
        if (currentPos < pos) {
            window.scrollTo(0, ((pos - currentPos) * progress / time) + currentPos);
        } else {
            window.scrollTo(0, currentPos - ((currentPos - pos) * progress / time));
        }
        if (progress < time) {
            window.requestAnimationFrame(step);
        } else {
            window.scrollTo(0, pos);
        }
    });
}