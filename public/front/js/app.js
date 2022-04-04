let baseUrl = 'http://127.0.0.1:8000/api/';

$.ajax({
  url: baseUrl + 'home',
  type: 'GET',
  success: function (response) {
    $("#home-title").append(response.home.title)
    $("#home-sub_title").append(response.home.sub_title)
    $("#home-hero").append(`<img src="` + response.home.image + `" class="img-fluid animated" alt="">`)
  }
})

$.ajax({
  url: baseUrl + 'about',
  type: 'GET',
  success: function (response) {
    $("#about-title").append(response.about.title)
    $("#about-sub_title").append(response.about.sub_title)
    $("#about-content").append(response.about.content)
    $("#about-hero").append(`<img src="` + response.about.image + `" class="" width="250" alt="">`)
  }
})

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

$.ajax({
  url: baseUrl + 'service',
  type: 'GET',
  success: function (response) {
    $.each(response.service, function (i, data) {
      $("#service-list").append(`<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5"
                    d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426">
                  </path>
                </svg>
                `+ data.icon + `
              </div>
              <h4><a href="">`+ data.title + `</a></h4>
              <p>` + data.description + `</p>
            </div>
          </div>`)

      $("#our-service").append(`<li><i class="bx bx-chevron-right"></i> <a href="javascript:void()">` + data.title + `</a></li>`)
    })

  }
})

$.ajax({
  url: baseUrl + 'client',
  type: 'GET',
  success: function (response) {
    $.each(response.client, function (i, data) {
      $("#list-client").append(`<div class="col-md-4 mb-3">
        <img src="`+ data.logo + `" alt="" class="img-fluid">

        <div class="mt-3 text-center">
            <h5>`+ data.name + `</h5>
          </div>
      </div>`)
    })
  }
})

$.ajax({
  url: baseUrl + 'product',
  type: 'GET',
  success: function (response) {
    $.each(response.products, function (i, data) {
      $("#list-product").append(`<div class="col-md-4">
      <div class="card border-0">
        <div class="card-body">
          <img src="`+ data.image + `" alt="" class="img-fluid">

          <div class="mt-3 text-center">
            <h5>`+ data.name + `</h5>
          </div>
        </div>
      </div>
    </div>`)
    })
  }
})

$.ajax({
  url: baseUrl + 'testimonial',
  type: 'GET',
  success: function (response) {
    $.each(response.testimonial, function (i, data) {
      $("#list-testimonial").append(`<div class="swiper-slide">
      <div class="testimonial-item">
        <p>
          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
          `+ data.desc + `
          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
        </p>
        <img src="`+ data.image + `" class="testimonial-img" alt="">
        <h3>`+ data.name + `</h3>
      </div>
    </div>`)
    })
  }
})

$.ajax({
  url: baseUrl + 'team',
  type: 'GET',
  success: function (response) {
    $.each(response.team, function (i, data) {
      $("#list-team").append(`<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
      <div class="member" data-aos="fade-up" data-aos-delay="100">
        <div class="member-img">
          <img src="`+ data.image + `" class="img-fluid" alt="">
          <div class="social">
            <a href="`+ data.twitter + `"><i class="bi bi-twitter"></i></a>
            <a href="`+ data.facebook + `"><i class="bi bi-facebook"></i></a>
            <a href="`+ data.instagram + `"><i class="bi bi-instagram"></i></a>
            <a href="`+ data.linkedin + `"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>`+ data.name + `</h4>
          <span>`+ data.position + `</span>
        </div>
      </div>
    </div>`)
    })
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