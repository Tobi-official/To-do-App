// Hamburger menu
  $('#hamburger_menu').on('click', function() {
      $('#dashboard_nav').toggle();
  });




$(document).ready(function() {
  $('.myh1').slideDown(2500)

})


// Edit profile
$('#edit_profile').on("submit", function(e) {
  e.preventDefault();
  $("#update").html('<i class="fas fa-spinner"></i> Loading...');

  const full_name = $('#full_name').val();
  const email = $('#email').val();
  const username = $('#username').val();
  const password = $('#password').val();
  const country = $('#country').val();
  const edit_bio = $('#edit_bio').val();
  const profile_img = $('#profile_picture').prop('files')[0];

  const formdata = new FormData(this);

  formdata.append('full_name', full_name);
  formdata.append('email', email);
  formdata.append('username', username);
  formdata.append('password', password);
  formdata.append('country', country);
  formdata.append('edit_bio', edit_bio);
  formdata.append('profile_img', profile_img);


  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        
         $('.message_container').fadeIn();
          if(this.responseText == "succesfully Updated!") {
              $(".success_msg").fadeIn();
              $(".success_msg").text(this.responseText);
          }else if(this.responseText == "Failed!"){
              $(".fail_msg").fadeIn();
              $(".fail_msg").text(this.responseText);
          }else {
            $(".fail_msg").fadeIn();
              $(".fail_msg").text(this.responseText);
          }
          setTimeout(function() {
              $('.message_container').fadeOut();
          }, 3000 );  
          $("#update").html('Update');

          $('#password').val('');
  
      }
      
  }

  ajax.open("POST", "../ajax/profile_update_ajax.php", true);
  ajax.send(formdata);
});


// Add Task 
$('#add_task').on("submit", function(e) {
  e.preventDefault();
  $("#submit").html('<i class="fas fa-spinner"></i> Loading...');

  const title = $('#title').val();
  const date = $('#date').val();
  const category = $('#category').val();
  const notes = $('#notes').val();
  const task = $('#task').val();

  const formdata = new FormData(this);

  formdata.append('title', title);
  formdata.append('date', date);
  formdata.append('category', category);
  formdata.append('notes', notes);
  formdata.append('task', task);


  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
  
         $('.alert_container').fadeIn();
               if(this.responseText == "Task Successfully Added") {
              $(".success_msg").fadeIn();
              $(".success_msg").text(this.responseText);
          }else if(this.responseText == "Failed!"){
              $(".fail_msg").fadeIn();
              $(".fail_msg").text(this.responseText);
          }else {
            $(".fail_msg").fadeIn();
              $(".fail_msg").text(this.responseText);
          }
          setTimeout(function() {
              $('.alert_container').fadeOut();
          }, 3000 );   
          $("#submit").html('Add Task');

            $('#title').val('');
            $('#date').val('');
            $('#category').val('');
            $('#notes').val('');
            $('#task').val('');
        
      }
      
  }

  ajax.open("POST", "../ajax/add_task_ajax.php", true);
  ajax.send(formdata);
});


setTimeout(() => {
  $('#reload')
}, 3000);



