<?php
	class Pagination{
		function __construct (){
		}	
		static function style1($numpage,$self,$currentpage){			
				$nav = "";
				for($i = 1; $i <= $numpage; $i ++)
				{
					if ($i == $currentpage)
						$nav .= $i;
					else
						$nav .= "<a href=\"$self?currentpage=$i\">$i</a> "; 
				}	

				return $nav;
			}
		static function style2($numpage,$self,$currentpage){
			if ($currentpage > 1){				
					$page = $currentpage - 1;
					$first = "<a href='$self?currentpage=1'>[First]</a> ";
					$prev = "<a href='$self?currentpage=$page'>[Previous]</a> ";
				}
				else{				
					$first = "[First]";
					$prev = "[Previous]";
				}
				if ($currentpage < $numpage){					
						$page = $currentpage + 1;
						$next = "<a href='$self?currentpage=$page'>[Next]</a> ";
						$last = "<a href='$self?currentpage=$numpage'>[Last]</a> ";
					}
				else{					
					$next = "[Next]";
					$last = "[Last]";
				}					
					$nav= $first . $prev . " Page ". $currentpage." ".$next . $last;
					return $nav;
		}
		
	}
?>