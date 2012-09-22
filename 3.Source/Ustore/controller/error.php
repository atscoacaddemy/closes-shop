<?php
   function showError()
   {
      die("SQL Error " . mysql_errno(  ) . " : " . mysql_error(  ));
   }
?>