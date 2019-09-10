<?php
//---------------------------用户自定义标签函数文件
//列表模板之列表式分页
function user_ShowListMorePage($num,$page,$dolink,$type,$totalpage,$line,$ok,$search="",$add){
	global $fun_r,$public_r;
	if($num<=$line)
	{
		$pager['showpage']='';
		return $pager;
	}
	//文件名
	if(empty($add['dofile']))
	{
		$add['dofile']='index';
	}
	//静态页数
	$repagenum=$add['repagenum'];
	$page_line=$public_r['listpagelistnum'];
	$snum=2;
	//$totalpage=ceil($num/$line);//取得总页数
	$firststr='<li class="disabled"><a title="Total record">'.$num.'</a></li>';
	//上一页
	if($page<>1)
	{
		$toppage='<li><a href="'.$dolink.$add['dofile'].$type.'">'.$fun_r['startpage'].'</a></li>';
		$pagepr=$page-1;
		if($pagepr==1)
		{
			$prido=$add['dofile'].$type;
		}
		else
		{
			$prido=$add['dofile'].'_'.$pagepr.$type;
		}
		$prepage='<li><a href="'.$dolink.$prido.'">'.$fun_r['pripage'].'</a></li>';
	}
	//下一页
	if($page!=$totalpage)
	{
		$pagenex=$page+1;
		$nextpagelink=$repagenum&&$repagenum<$pagenex?eReturnRewritePageLink2($add,$pagenex):$dolink.$add['dofile'].'_'.$pagenex.$type;
		$lastpagelink=$repagenum&&$repagenum<$totalpage?eReturnRewritePageLink2($add,$totalpage):$dolink.$add['dofile'].'_'.$totalpage.$type;
		$nextpage='<li><a href="'.$nextpagelink.'">'.$fun_r['nextpage'].'</a></li>';
		$lastpage='<li><a href="'.$lastpagelink.'">'.$fun_r['lastpage'].'</a></li>';
	}
	$starti=$page-$snum<1?1:$page-$snum;
	$no=0;
	for($i=$starti;$i<=$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1='<li class="active"><a href="#">';
			$is_2='</a></li>';
		}
		elseif($i==1)
		{
			$is_1='<li><a href="'.$dolink.$add['dofile'].$type.'">';
			$is_2="</a></li>";
		}
		else
		{
			$thispagelink=$repagenum&&$repagenum<$i?eReturnRewritePageLink2($add,$i):$dolink.$add['dofile'].'_'.$i.$type;
			$is_1='<li><a href="'.$thispagelink.'">';
			$is_2="</a></li>";
		}
		$returnstr.=''.$is_1.$i.$is_2;
	}
	$returnstr=$firststr.$toppage.$prepage.$returnstr.$nextpage.$lastpage;
	$pager['showpage']=$returnstr;
	return $pager;
}
?>