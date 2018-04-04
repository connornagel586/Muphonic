$("document").ready(function(){



  $(".topic").click(function(){
    window.location = 'forum_page.php?topic_id=' + $(this).attr("value");
  });

  $("#add_topic").click(function(){
    $(".this_topic").toggle();
    if($(".this_topic").is(":visible")){
      $("#add_topic").text("Close Topic");
    }else{
      $("#add_topic").text("New Topic");
    }
  });


});
