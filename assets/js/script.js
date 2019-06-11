document.addEventListener('scroll', () => {
  var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollPos > 50) {
	  document.querySelector('header').classList.add('sticky');
  } else {
	  document.querySelector('header').classList.remove('sticky');
  }
});