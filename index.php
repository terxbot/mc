<?php
/*
<//*/ @api_web / @kick_01 /*//>
*/
define('API_KEY','610357334:AAFuSHCw2ToBmD1qPPW0Hh1VpK23t6b5fIk');
function robot($method,$datas=[]){
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
  $res = curl_exec($ch);
  if(curl_error($ch)){
      var_dump(curl_error($ch));
  }else{
      return json_decode($res);
  }
}
function api($method,$datas=[]){
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
  $res = curl_exec($ch);
  if(curl_error($ch)){
      var_dump(curl_error($ch));
  }else{
      return json_decode($res);
  }
}
///==============================
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$message_id = $message->message_id;
$firstname = $message->from->first_name;
$username = $message->from->username;
}
  //$update->callback_query
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$messageid = $update->callback_query->message->message_id;
$firstnameq = $update->callback_query->from->first_name;
$username = $update->callback_query->from->username;
$gpname = $update->callback_query->message->chat->title;
}
if(isset($update->reply_to_message)){
$replyt = $update->message->reply_to_message;
$reid = $update->message->reply_to_message->from->id;
$reuser = $update->message->reply_to_message->from->username;
$rename = $update->message->reply_to_message->from->first_name;
$remsgid = $update->message->reply_to_message->message_id;
$replyr = $update->message->reply_to_message->forward_from->id;
}
if(isset($update->message->new_chat_member)){
$newchatmemberid = $update->message->new_chat_member->id;
$newchatmemberu = $update->message->new_chat_member->username;
}
if(isset($update->message->chat)){
$chattype = $update->message->chat->type;
$namegroup = $update->message->chat->title;
}
if(isset($update->message->caption)){
$caption = $update->message->caption;
}
if(isset($update->edit_message)){
$chat_edit_id = $update->edited_message->chat->id;
$message_edit_id = $update->edited_message->message_id;
$edit_for_id = $update->edited_message->from->id;
}
//database
$server = "localhost";
$dbname = "niko";
$passw = "ECYW8l876CjMKfTmgnTCP2Cj6XVt28Y1";
$dbuser = "root";
$con = mysqli_connect($server,$dbuser,$passw,$dbname);
$con->set_charset("utf8mb4");
  //administrator
$admins = array("204378180");
$idbot = "u8ubot";//id bot
$idchannel = "mo_0hammed";// id channel
$name2 = "MohammedQader";//name channel
$idabot = 610357334;//idbot
$channel1 = "@mo_0hammed";//id channel with @
$idcha5 = 'mo_0hammed';
//apitel
$statjson = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=$from_id"));
  $sta1 = $statjson->result->status;
$stat2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chatid&user_id=$fromid"));
  $sta1q = $stat2->result->status;
  $status2 = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=$idabot"));$sta3 = $status2->result->status;
  $statjson = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=$reid"));
  $sta1r = $statjson->result->status;
/////////////
function sendMessage($chat_id,$text){
    robot('sendMessage',['chat_id'=>$chat_id,'text'=>$text,
    ]);
}
function SendPhoto($chat_id,$photo,$caption){
    robot('SendPhoto',['chat_id'=>$chat_id,'photo'=>$photo,'caption'=>$caption,
    ]);
}
function senddocument($chat_id,$document,$caption){
    robot('senddocument',['chat_id'=>$chat_id,'document'=>$document,'caption'=>$caption,
    ]);
}
function Ne_Emojis($string){
$ne = preg_split('//u',$string);
foreach($ne as $value){
      if(ord($value)==240|ord($value)==226){
         $r[]=$value;
     }
}
return $r;
}
function IranTime(){
    date_default_timezone_set("Asia/Tehran");
    return date('H:i:s');
}
function ta_latin_num($string) {
  $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $latin_num = range(0, 9);
   
  $string = str_replace($persian_num, $latin_num, $string);
   
  return $string;
}
function fa_digits($text1){
        $persian_digits = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
        $english_digits = array('0','1','2','3','4','5','6','7','8','9');
        $text = str_replace($english_digits, $persian_digits, $text1);
        return $text;
    }
function admin($chat_id){
$stat = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatAdministrators?chat_id=$chat_id"));
$sta1q = $stat->result;    
return $sta1q;
}
function deletemessage($chat_id,$message_id){
    robot('deletemessage',['chat_id'=>$chat_id,'message_id'=>$message_id,]);
}
function Forward($where,$go,$msg){
    robot('forwardmessage',['chat_id'=>$where,'from_chat_id'=>$go,'message_id'=>$msg]);
}
$zaman = IranTime();
///========plugins 
if(isset($update)){
foreach (glob("plugins2/*.php") as $filename)
 {
     require_once $filename;
     }
 }

unlink("error_log");
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>