<?php

   function pagination($statement,$per_page = 1,$page,$session,$name_Qu, $url = '?'){
     include"cont.php";
    	$query =mysqli_query($connect,"SELECT COUNT(*) as `Qu_id` FROM {$statement}");
    	$row = mysqli_fetch_array($query);
    	$total = $row['Qu_id'];
        $adjacents = "0";

    	$page = ($page == 0 ? 1 : $page);
    	$start = ($page - 0) * $per_page;

    	$prev = ceil($page -1);
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;

    	$pagination = "";
    	if($lastpage >= 1)
    	{
    		$pagination .= "<center><div class='pagination'></div>";
                    $pagination .= "<div class='details'>عدد الاسئله $page من $lastpage</div>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
$pagination.= "<div class='current'>
       <a >السؤال($counter)</a></div>";
    				else
    					$pagination.= "<a href='{$url}page=$counter&session=$session&nameQu=$name_Qu'><div class='current2'>$counter</div></a>";


    			}

    		}
       /*   if($page < $counter ){
            $pagination.= "<div class='current2' ><a href='{$url}page=1&session=$session&nameQu=$name_Qu'>$counter</a></div>";

          }*/
    		/*elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))
    			{
    				for ($counter = 1; $counter < 2 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter&session=$session'>$counter</a></li>";
    				}
    				$pagination.= "<li class='dot'>...</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1&session=$session'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage&session=$session'>$lastpage</a></li>";
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<li><a href='{$url}page=1&session=$session'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2&session=$session'>2</a></li>";
    				$pagination.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter&session=$session'>$counter</a></li>";
    				}
    				$pagination.= "<li class='dot'>..</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1&session=$session'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage&session=$session'>$lastpage</a></li>";
    			}
    			else
    			{
    				$pagination.= "<li><a href='{$url}page=1&session=$session'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2&session=$session'>2</a></li>";
    				$pagination.= "<li class='dot'>..</li>";
    				for ($counter = $lastpage - (0 + ($adjacents * 0)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter&session=$session'>$counter</a></li>";
    				}
    			}
    		}

    		if ($page < $counter -0){
    			$pagination.= "<li><a href='{$url}page=$next&session=$session'>التالى</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage&session=$session'>الاخيرة</a></li>";
    		}else{
    			             			$pagination.= "<li><a href='{$url}page=$prev&session=$session'>السابق</a></li>";
                $pagination.= "<li><a class='current'>الاخيرة</a></li>";

            }*/

    		$pagination.= "<div class='pagination'></div></center>";
    	}


        return $pagination;
    }

?>