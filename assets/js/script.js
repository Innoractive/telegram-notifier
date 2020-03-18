document.addEventListener('scroll', () => {
  var scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollPos > 50) {
	  document.querySelector('header').classList.add('sticky');
  } else {
	  document.querySelector('header').classList.remove('sticky');
  }
  if(scrollPos > 500) {
    $('#fab-btn').addClass('active');
  } else {
    $('#fab-btn').removeClass('active');
  }
});

function copytext() {
  var email = document.getElementById('telegram-email').value;
  var copyFrom = document.getElementById('copy-textarea');
  copyFrom.innerHTML = email;
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
  $('#chat-id').focus();
}

$(document).ready(function() {
  var i = 0;
  $('.topic .nes-container').hide();
  $('.topic .nes-container').each(function() {
    var obj = this;
    setTimeout(function() {
      $(obj).not('#last-step,#email-block').show();
      $(obj).addClass('animated').addClass('slideInLeft');
    }, ++i * 300);
  });
  $('#chat-id').click(function() {
    $('#chat-id').removeClass('is-error');
    $(this).val('');
    $('#last-step').hide();
    $(this).keyup();
  });
  $('#chat-id').keyup(function() {
    if($(this).val() != '') {
      if(/^[-t]{0,1}[0-9]+$/.test($(this).val())) {
        $('#chat-id').removeClass('is-error');
        setTimeout(function () {
          $('#chat-id').removeClass('is-error');
        }, 1000);
        $('#telegram-email').val($(this).val().replace(/-/, "t") + mail_domain);
        $('#email-block').show();
      } else {
        setTimeout(function () {
          $('#chat-id').addClass('is-error');
        }, 1000);
        $('#email-block').hide();
      }
    } else {
      $('#telegram-email').val('');
      $('#email-block').hide();
    }
  });
  $('#copy-btn').click(copytext);
});