// Register Ajax
$("#register_form").on("submit", function(e) {
    e.preventDefault();
    $('#submit').text('Loading...');
    let full_name = $("#full_name").val();
    let email = $("#email").val();
    let username = $("#username").val();
    let password = $("#password").val();
    let confirm_password = $("#confirm_password").val();
    
    var formdata = new FormData();
    const xhttp = new XMLHttpRequest();


    formdata.append('full_name', full_name);
    formdata.append('email', email);
    formdata.append('username', username);
    formdata.append('password', password);
    formdata.append('confirm_password', confirm_password);
    
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        //Send Success message
          
        if(this.responseText == "Succesfully Registered!") {      
          $('.success').fadeIn('slow');
             $('.success').text(this.responseText);
             window.location.href= "login_username.php";
        }else { 
          if(this.responseText == "Password do not match") {
            $('.fail').fadeIn('slow');
            $('.fail').text('Password do not match');
          }   
      }
        setTimeout(function() {
              $('.success').fadeOut('slow');
              $('.fail').fadeOut('slow');
              window.location.reload();
            }, 2000)
            

        $('#full_name').val('');
        $('#email').val('');
        $('#username').val('');
        $('#password').val('');
        $('#confirm_password').val('');

        $('#submit').text('Submit');
      }
    }
    xhttp.open("POST", "ajax/register_ajax.php", true);
    xhttp.send(formdata);
 });


// Login username
 $("#login_username").on("submit", function(e) {
  e.preventDefault();

  $('#submit').text('Loading...');
  let email = $("#email").val();
  let username = $("#username").val();
  let password = $("#password").val();
  
  var formdata = new FormData();
  const xhttp = new XMLHttpRequest();


  formdata.append('email', email);
  formdata.append('username', username);
  formdata.append('password', password);
  
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      //Send Success message

      console.log(this.responseText)
        
      if(this.responseText == "No user found!") {
          $('.login_fail').fadeIn('slow');
           $('.login_fail').text(this.responseText);
      }else
        if(this.responseText == "Incorrect password") {
          $('.login_fail').fadeIn('slow');
          $('.login_fail').text(this.responseText);
    }else 
      if(this.responseText == "Correct password") {
        
        setTimeout(() => {
          $('.success').fadeIn('slow');
        $('.success').text('Successful');
        }, 3000);
        window.location.href= "dashboard.php";
  }
        setTimeout(function() {
          $('.login_fail').fadeOut('slow');
        $('.success').fadeOut('slow');
          window.location.reload();
        }, 3000) 

  
      $('#submit').text('Submit');
  }  
  }
  xhttp.open("POST", "ajax/login_username_ajax.php", true);
  xhttp.send(formdata);
});


// login email
$("#login_email").on("submit", function(e) {
  e.preventDefault();

  $('#submit').text('Loading...');
  let email = $("#email").val();
  let username = $("#username").val();
  let password = $("#password").val();
  
  var formdata = new FormData();
  const xhttp = new XMLHttpRequest();


  formdata.append('email', email);
  formdata.append('username', username);
  formdata.append('password', password);
  
  xhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      //Send Success message
      
      if(this.responseText == "Invalid Email address!") {
          $('.login_fail').fadeIn('slow');
           $('.login_fail').text("Incorrect Email!");
      }else
        if(this.responseText == "Incorrect password") {
          $('.login_fail').fadeIn('slow');
          $('.login_fail').text(this.responseText); 
    }else 
      if(this.responseText == "Correct password") {
        setTimeout(() => {
          $('.success').fadeIn('slow');
        $('.success').text('Successful');
        }, 3000);
        window.location.href= "dashboard.php";

    }
      setTimeout(function() {
            $('.login_fail').fadeOut('slow');
           $('.success').fadeOut('slow');
            window.location.reload();
          }, 3000)

 
      $('#submit').text('Submit');
    }  
         
  }
  xhttp.open("POST", "ajax/login_email_ajax.php", true);
  xhttp.send(formdata);
});

 
