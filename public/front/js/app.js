let baseUrl = 'http://127.0.0.1:8000/api/';

$.ajax({
  url: baseUrl + 'contact',
  type: 'GET',
  success: function (response) {
    $("#addres").append(response.contact.addres)
    $("#email").append(response.contact.email)
    $("#telp").append(response.contact.telp)
    $("#maps").attr('src', response.contact.maps)
    $("#footer-contact").append(`` + response.contact.addres + ` <br><br>
        <strong>Phone:</strong> `+ response.contact.telp + `<br>
        <strong>Email:</strong> `+ response.contact.email + `<br>`)
  }
})

$('.php-email-form').submit(function (e) {
  console.log("ok");
  var dataStr = "nama" + ":" + $('#name').val() + "\n" + "email" + ":" + $('#email').val() + "\n" + "subject" + ":" + $('#subject').val() + "message" + ":" + $('#message').val() + "\n";

  e.preventDefault();
  $.ajax({
    url: "https://api.telegram.org/bot1059144067:AAECI0pEjtuwBlfGKvb4W0mWB6MjzMj56Nk/sendMessage",

    method: 'POST',
    data: { chat_id: '900448515', text: dataStr },
    success: function () {
      $("#name").val("");
      $("#email").val("");
      $("#subject").val("");
      $("#message").val("");
    }
  });
});