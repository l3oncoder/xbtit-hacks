<?php
require_once ("include/functions.php");
require_once ("include/config.php");
dbconn();
  if ($CURUSER["uid"] > 1)
    {
  $uid=". mysqli_escape_string($CURUSER['uid']).";
  $r=do_sqlquery("SELECT * from {$TABLE_PREFIX}users where id=$uid");
  $r->data_seek(0); $c=$r->fetch_array()["seedbonus"];
if($c>=$GLOBALS["price_ct"]) {
          if (isset($_POST["title"])) $custom=$mysqli->escape_string($_POST["title"]);
             else $custom = "";
    if ("$custom"=="")
        {
          do_sqlquery("UPDATE {$TABLE_PREFIX}users SET custom_title=NULL WHERE id='".$userid."'");
        }
    else
        {
          do_sqlquery("UPDATE {$TABLE_PREFIX}users SET custom_title='".htmlspecialchars($custom)."' WHERE id=$CURUSER[uid]");
        }
        $p=$GLOBALS["price_ct"];
        do_sqlquery("UPDATE {$TABLE_PREFIX}users SET seedbonus=seedbonus-$p WHERE id=$CURUSER[uid]");
        }
header("Location: index.php?page=modules&module=seedbonus");
   }
else header("Location: index.php");
?>
