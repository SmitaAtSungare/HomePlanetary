<?php
function sendMessage($text,$mobile){
//   echo $text.$mobile;
    echo "<script>"
        ."$.ajax({"
        ."url : 'http://trans.smsfresh.co/api/sendmsg.php',"
        ."type : 'get',"
        ."data : {user:'magarsham', pass:'admin1234', sender:'FESTVT' ,phone:'".$mobile."', text:'".$text."', priority:'ndnd', stype:'normal'}"
        ."});"
        ."</script>";
}
?>