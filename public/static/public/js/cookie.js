$(document).ready(function(){
  if (Cookies.get('schCookieNotification')) {
    $('#cookies_section').addClass('hide');
    $('.cookies_content').addClass('hide');
  }
  else {
    $('#cookies_section').removeClass('hide');
    $("#cookies_section").addClass('cookies_sch');
  };

  $('.close-cookie').click(function () {
    Cookies.set('schCookieNotification', 'true', { expires: 20*365 });
    $('#cookies_section').addClass('push-top');
    $('.cookies_content').addClass('hide');
    $('.close-cookie').addClass('hide');
  });
  $('.privacy-popup').click(function() {
    $('#privacyBack').css("display", "block");
    $('#privacyDialogWrapper').css("display", "block");
  });

  $('#privacyDialog div').click(function(e) {
    e.stopPropagation();
  })
  $('#privacyDialog p').click(function(e) {
    e.stopPropagation();
  })

  $('#privacyDialogWrapper').click(function() {
    $('#privacyBack').css("display", "none");
    $('#privacyDialogWrapper').css("display", "none");
  })

});