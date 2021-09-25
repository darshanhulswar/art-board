$(document).ready(function () {
  $("form").submit((e) => {
    let formData = {
      firstName: $("#first-name").val(),
      lastName: $("#last-name").val(),
      gender: $('input[name="gender"]:checked').val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      password: $("#password").val(),
    };
    console.log("inside script");

    $.ajax({
      type: "POST",
      url: "php/signup.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (data) {
        console.log(data);
      })
      .fail(function (err) {
        console.log(err);
      });

    e.preventDefault();
    $("#reg-form").trigger("reset");
  });
});
