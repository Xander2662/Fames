<?php

?>
<script>
$(document).ready(function(){
for(var i=1;i<=8;i++)
{
    $("#pole").append($("<div></div>").addClass("card").append($("<div></div>").addClass("title").text("test"+i)).append($("<div></div>").addClass("like").append($("<p></p>").text("0"))).append($("<div></div>").addClass("gem")).append($("<img>").addClass("picture").attr("src","../../public/usrimg/img-bozi ("+i+").jpeg")).append($("<div></div>").addClass("text")).append($("<p></p>").addClass("iden1").text("card set: WARFRAME")).append($("<p></p>").addClass("iden2").text("user: admin1")))
}


$(".card").dblclick(function(){
  $(this).hide();
});
});
</script>