<?php
require_once ("include/functions.php");
require_once ("include/config.php");
dbconn();
  if ($CURUSER["uid"] > 1)
    {
  $uid=". mysqli_escape_string($CURUSER['uid']).";
  $r=do_sqlquery("SELECT * from {$TABLE_PREFIX}users where id=$uid");
  $r->data_seek(0); $c=$r->fetch_array()["seedbonus"];
if($c>=$GLOBALS["price_name"]) {
          if (isset($_POST["name"])) $custom=$mysqli->escape_string($_POST["name"]);
             else $custom = "";
    if ("$custom"=="")
        {
        }
    else
        {
          $res=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users WHERE username='".htmlspecialchars($custom)."'",true);
          if ($res->num_rows > 0){}else
          {do_sqlquery("UPDATE {$TABLE_PREFIX}users SET username='".htmlspecialchars($custom)."' WHERE id=$CURUSER[uid]");
          if ($FORUMLINK=="smf")
                {do_sqlquery("UPDATE {db_prefix}members SET  memberName='".htmlspecialchars($custom)."' WHERE ID_MEMBER=".$CURUSER["smf_fid"]);}
          $p=$GLOBALS["price_name"];
          do_sqlquery("UPDATE {$TABLE_PREFIX}users SET seedbonus=seedbonus-$p WHERE id=$CURUSER[uid]");}
        }
        }
header("Location: index.php?page=modules&module=seedbonus");
   }
else header("Location: index.php");
?>
