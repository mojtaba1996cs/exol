<?php
function pagination($statement,$per_page = 1,$page,$url = '?'){
     include"cont.php";
    	$query =mysqli_query($connect,"SELECT COUNT(*) as `Std_id` FROM {$statement}");
    	$row = mysqli_fetch_array($query);
    	$total = $row['Std_id'];
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
$pagination .= "<div class='details'>عدد الصفحات $page من $lastpage</div>";
          if($total <= 10){
            echo "<div id='page2'>";
           $pagination.= "<a href='{$url}page=1' class='current3'>الاولي</a></div>";
          }elseif($page == 1){
  echo "<div id='page2'>";
     $pagination.= "<a href='{$url}page=$next' class='current3'>التالى</a>";
  $pagination.= "<a href='{$url}page=$lastpage' class='current3'>الاخيرة</a></div>";
}elseif ($page < $lastpage){
  echo "<div id='page2'>";
   $pagination.= "<a href='{$url}page=$next' class='current3'>التالى</a>";
$pagination.=
"<a href='{$url}page=$prev' class='current3'>السابق</a>";
$pagination.= "<a href='{$url}page=$lastpage' class='current3'>الاخيرة</a></div>";
    		}elseif($page = $lastpage){
  echo "<div id='page2'>";
$pagination.= "<a href='{$url}page=$prev' class='current3'>السابق</a>";
$pagination.= "<a href='{$url}page=1' class='current3'>الاولي</a></div>";
            }
    	}


        return $pagination;
    }

?>