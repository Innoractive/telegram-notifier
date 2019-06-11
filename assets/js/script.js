document.addEventListener('scroll', () => {
  var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollPos > 50) {
	  document.querySelector('header').classList.add('sticky');
  } else {
	  document.querySelector('header').classList.remove('sticky');
  }
});

function copytext() {
  var email = document.getElementById('telegram-email').value;
  var copyFrom = document.getElementById('copy-textarea');
  if(!copyFrom) {
    copyFrom = document.createElement('textarea');
    copyFrom.id = 'copy-textarea';
    copyFrom.style = 'position: absolute;left:-1000px;top:-1000px;';
    copyFrom.innerHTML = email;
    document.querySelector('body').appendChild(copyFrom);
  } else {
    copyFrom.innerHTML = email;
  }

  copyFrom.select();
  document.execCommand('copy');

  if(email == '' || email == mail_domain) {
    $('#chat-id').addClass('is-error');
    $('#last-step').hide();
  } else {
    $('#chat-id').removeClass('is-error');
    $('#email-link').text(email);
    $('#email-link').attr('href', 'mailto:' + email);
    $('#last-step').show();
  }
}

$(document).ready(function() {
  $('#chat-id').click(function() {
    $(this).val('');
    $('#last-step').hide();
    $(this).keyup();
  });
  $('#chat-id').keyup(function() {
    if($(this).val() != '') {
      $('#chat-id').removeClass('is-error');
      $('#telegram-email').val($(this).val() + mail_domain);
    } else {
      $('#telegram-email').val('');
    }
  });
  $('#copy-btn').click(copytext);
});