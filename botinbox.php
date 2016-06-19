<?php

$access_token= ("EAAAAPJmB8ZBwBADJmgmXZBN8IdbZBmBo3yDBBrxsfI1LMdQE9yax1dLwH4NzpPjW9FSMAlHuGvGVIrAfAMN16sZA87emJIRMtGpr6pxbvWv9hNHcqbffuAEvcaXUrbOrEACfa8EXCHuZBVsnFADSLZB0n3tUkKwKR1wIqJvDAnVLnZC3GOuaMsq");

$me=json_decode(auto('https://graph.facebook.com/me?access_token='.$access_token),true);
$in=json_decode(auto('https://graph.facebook.com/me/inbox?access_token='.$access_token.'&fields=id,to,unread,unseen'),true);
for($i=1;$i<=count($in[data]);$i++){
   if($in[data][$i-1][to][data][0][id] == $me[id]){
       $from=$in[data][$i-1][to][data][1];
       }else{
       $from=$in[data][$i-1][to][data][0];
       }
   echo $in[data][$i-1][id].'=>'.$from[name];
   if(($in[data][$i-1][unseen] == '1' ) && ($in[data][$i-1][unread] == '1')){
         $xnam = explode(' ',$from[name]);
         $nama = $xnam[0];
         $arr_mess = array(
            ' Maaf bro '.$nama.' ,bossku si Rinto lagi offline ',
            ' Ada apa ya '.$nama.' ? maaf saya cuma Robot Inbox ditugaskan sama boss Rinto untuk bales Inbox :v :p ',
            );
         $message = $arr_mess[rand(0,count($arr_mess)-1)];
         auto('https://graph.facebook.com/'.$from[id].'/inbox?access_token='.$access_token.'&message='.urlencode($message).'&method=post&subject=+');
         echo'bales => '.$message.'<br/>';
         }
    echo'<hr/>';
   }


function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }
?>
