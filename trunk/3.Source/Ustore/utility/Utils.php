<?php
class Utils
{
	public static function convert_Money($money)
	{
		$money =(string) $money;
		$first = "";
		$second = "";
		$dem =0;
		for($i=strlen($money)-1;$i >= 0;$i--)
		{
			if($dem % 3 == 0 && $dem != 0)
				$first.=",";
			$first.=$money[$i];
			$dem++;
		}
		for($i=strlen($first)-1;$i >= 0;$i--)
		{
			$second.=$first[$i];
		}
		return $second;
	}
    public static function convert_time($time)
    {
    	$arrDate = explode ("-", $time);
    	$d = (int) $arrDate[2];
    	$m = (int) $arrDate[1];
    	$y = (int) $arrDate[0];
    	$arrTime = explode (":",substr($arrDate[2],2));
    	
    	$time_out = $arrTime[0].":".$arrTime[1].":".$arrTime[2]." ngày ".$d."/".$m."/".$y;
    	return $time_out;
    }

    public static function paging($href,$totalProducts,$curPage,$maxShowedPage=5,$maxProductPerPage=15)
    {			 				
    	$paging="";	         		 
    	$mxR = $maxProductPerPage;
    	$mxP = $maxShowedPage;
    	if($totalProducts%$mxR==0)  
    		$totalPages = (int)($totalProducts/$mxR);
    	else 
    		$totalPages = (int)($totalProducts/$mxR+1);
    			
    	if($totalProducts>$mxR)
    	{
    		$paging="<div align='center'><br>";
    		if ($curPage==1)
    		{
    			$paging.="<img src='images/previous_disable.gif' border='0'>\n";
    		}
    		else
    		{ 
    			$paging.=sprintf ("<a href='%spage=1' style='text-decoration:none'>Trang đầu</a> \n",$href);
    			$paging.=sprintf ("<a href='%spage=%d'class='link_image'><img src='img/icons/arrow_left.gif' border='0'></a> \n",$href,$curPage-1);
    		}				 	 
    		for($i=1;$i<=$totalPages;$i++)
    		{	
    			if(($i>((int)(($curPage-1)/$mxP))* $mxP) && ($i<=((int)(($curPage-1)/$mxP+1))* $mxP))
    			{
    				if($i==$curPage)      
    					$paging .= " \n <span class='curpage'>". $i."</span>&nbsp;&nbsp; \n";
    				else    
    					$paging .= sprintf ("<a href='%spage=%d'>%d</a>&nbsp;&nbsp; \n",$href,$i,$i);
    			}
    		}
    		if ($curPage<$totalPages)
    		{
    			
    			$paging.=sprintf ("<a href='%spage=%d' class='link_image'><img src='img/icons/arrow_right.gif' border='0'></a> \n",$href,$curPage+1);
    			$paging.=sprintf ("<a href='%spage=%d' style='text-decoration:none'>Trang cuối</a> \n",$href,$totalPages);
    		}
    		else
    			$paging.="<img src='images/next_disable.gif' border='0'>\n";
    		$paging.="<br></div>";
    	}
    	return $paging;
    }
    public static function getMoneyPerHouse($business)
    {
        //1.000.000 => 1
        require_once("../BUS/DonviTienBUS.php");
        $dvTien=DonViTienBUS::selectId($business['donvitien']);
        $money=$business['giaban'];
        $money=$money*$dvTien['tigia'];
        if($business['donvidv']==1)//so tien tren m2
            $money=$money*$business['dai']*$business['rong'];
    //    echo "alibaba".$money;
        return $money;
    }
}
?>