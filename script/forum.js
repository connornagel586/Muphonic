$("document").ready(function(){



  $(".topic").click(function(){
    window.location = 'forum_page.php?topic_id=' + $(this).attr("value");
  });

  $("#add_topic").click(function(){
    var str =		   "<div class=\"this_topic\">\
    <input type=\"text\" placeholder=\"Title\"  name=\"class\">\
    <input type=\"text\" placeholder=\"Class Number\" name=\"classNum\"><br>\
    <input type=\"text\" placeholder=\"Professor\" name=\"professor\">\
    <input type=\"text\" placeholder=\"Credits\" name=\"credits\"><br>\
    <input type=\"text\" placeholder=\"Grade\" name=\"grade\"><br>\
    </div>"

    $(".new_topic").append(str);
  });


});
