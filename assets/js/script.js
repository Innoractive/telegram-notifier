document.addEventListener('scroll', () => {
  var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollPos > 50) {
	  document.querySelector('header').classList.add('sticky');
  } else {
	  document.querySelector('header').classList.remove('sticky');
  }
});

$(document).ready(function() {
  $('#chat-id').keyup(function() {
    $('#telegram-email').val($(this).val() + mail_domain);
  });
});