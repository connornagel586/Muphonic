$(document).ready(function(){



  $(".chat").click(function(){
    window.location = 'chat_room.php?chat_id=' + $(this).attr("value");
  });

  $('#messages').on('load', showNewMessages());
  $("#submitmsg").submit(function(e){
  e.preventDefault();
      $.post('handlers/chat_handler.php'), "post",$('#msg').serializeArray(), function(data){
        	$("#usermsg").attr("value", "");
          $('#chatbox').append(data);
      };

      return false;

  });

function showNewMessages(){
  $.ajax({
      url: 'handlers/chat_handler.php',
      success: function(data) {
          $('#chatbox').append(data);


      }
    });
    setTimeout(showNewMessages, 5000); // you could choose not to continue on failure...
}

});
