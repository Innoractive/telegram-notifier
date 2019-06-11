document.addEventListener('scroll', () => {
  var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollPos > 50) {
	  document.querySelector('header').classList.add('sticky');
  } else {
	  document.querySelector('header').classList.remove('sticky');
  }
});

function copytext() {
  var text = document.getElementById('telegram-email').value;
  var copyFrom = document.getElementById('copy-textarea');
  if(!copyFrom) {
    copyFrom = document.createElement('textarea');
    copyFrom.id = 'copy-textarea';
    copyFrom.style = 'position: absolute;left:-1000px;top:-1000px;';
    copyFrom.innerHTML = text;
    document.querySelector('body').appendChild(copyFrom);
  } else {
    copyFrom.innerHTML = text;
  }

  copyFrom.select();
  document.execCommand('copy');

  $('#email-link').text(text);
  $('#email-link').attr('href', 'mailto:' + text);
  $('#last-step').show();
}

$(document).ready(function() {
  $('#chat-id').keyup(function() {
    $('#telegram-email').val($(this).val() + mail_domain);
  });
  $('#copy-btn').click(copytext);
});