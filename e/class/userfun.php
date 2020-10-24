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
	$firststr='<li class="page-item class="disabled"><a class="page-link" title="Total record">'.$num.'</a></li>';
	//上一页
	if($page<>1)
	{
		$toppage='<li class="page-item"><a class="page-link" href="'.$dolink.$add['dofile'].$type.'">'.$fun_r['startpage'].'</a></li>';
		$pagepr=$page-1;
		if($pagepr==1)
		{
			$prido=$add['dofile'].$type;
		}
		else
		{
			$prido=$add['dofile'].'_'.$pagepr.$type;
		}
		$prepage='<li class="page-item"><a class="page-link" href="'.$dolink.$prido.'">'.$fun_r['pripage'].'</a></li>';
	}
	//下一页
	if($page!=$totalpage)
	{
		$pagenex=$page+1;
		$nextpagelink=$repagenum&&$repagenum<$pagenex?eReturnRewritePageLink2($add,$pagenex):$dolink.$add['dofile'].'_'.$pagenex.$type;
		$lastpagelink=$repagenum&&$repagenum<$totalpage?eReturnRewritePageLink2($add,$totalpage):$dolink.$add['dofile'].'_'.$totalpage.$type;
		$nextpage='<li class="page-item"><a class="page-link" href="'.$nextpagelink.'">'.$fun_r['nextpage'].'</a></li>';
		$lastpage='<li class="page-item"><a class="page-link" href="'.$lastpagelink.'">'.$fun_r['lastpage'].'</a></li>';
	}
	$starti=$page-$snum<1?1:$page-$snum;
	$no=0;
	for($i=$starti;$i<=$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1='<li class="page-item class="active"><a class="page-link" href="#">';
			$is_2='</a></li>';
		}
		elseif($i==1)
		{
			$is_1='<li class="page-item"><a class="page-link" href="'.$dolink.$add['dofile'].$type.'">';
			$is_2="</a></li>";
		}
		else
		{
			$thispagelink=$repagenum&&$repagenum<$i?eReturnRewritePageLink2($add,$i):$dolink.$add['dofile'].'_'.$i.$type;
			$is_1='<li class="page-item"><a class="page-link" href="'.$thispagelink.'">';
			$is_2="</a></li>";
		}
		$returnstr.=''.$is_1.$i.$is_2;
	}
	$returnstr=$firststr.$toppage.$prepage.$returnstr.$nextpage.$lastpage;
	$pager['showpage']=$returnstr;
	return $pager;
}

//内容分页
function user_ShowTextPage($totalpage,$page,$dolink,$add,$type,$search=""){
	global $fun_r,$public_r;
	if($totalpage==1)
	{
		return '';
	}
	$page_line=$public_r['textpagelistnum'];
	$snum=2;
	//$totalpage=ceil($num/$line);//取得总页数
	$firststr='<li class="page-item class="disabled"><a class="page-link" title="Total record">'.$page.'/'.$totalpage.'</a></li>';
	//上一页
	if($page<>1)
	{
		$toppage='<li class="page-item"><a class="page-link" href="'.$dolink.$add[filename].$type.'">'.$fun_r['startpage'].'</a></li>';
		$pagepr=$page-1;
		if($pagepr==1)
		{
			$prido=$add[filename].$type;
		}
		else
		{
			$prido=$add[filename].'_'.$pagepr.$type;
		}
		$prepage='<li class="page-item"><a class="page-link" href="'.$dolink.$prido.'">'.$fun_r['pripage'].'</a></li>';
	}
	//下一页
	if($page!=$totalpage)
	{
		$pagenex=$page+1;
		$nextpage='<li class="page-item"><a class="page-link" href="'.$dolink.$add[filename].'_'.$pagenex.$type.'">'.$fun_r['nextpage'].'</a></li>';
		$lastpage='<li class="page-item"><a class="page-link" href="'.$dolink.$add[filename].'_'.$totalpage.$type.'">'.$fun_r['lastpage'].'</a></li>';
	}
	$starti=$page-$snum<1?1:$page-$snum;
	$no=0;
	for($i=$starti;$i<=$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1='<li class="page-item class="active"><a class="page-link" href="#">';
			$is_2="</a></li>";
		}
		elseif($i==1)
		{
			$is_1='<li class="page-item"><a class="page-link" href="'.$dolink.$add[filename].$type.'">';
			$is_2="</a></li>";
		}
		else
		{
			$is_1='<li class="page-item"><a class="page-link" href="'.$dolink.$add[filename].'_'.$i.$type.'">';
			$is_2="</a></li>";
		}
		$returnstr.=''.$is_1.$i.$is_2;
	}
	$returnstr=$firststr.$toppage.$prepage.$returnstr.$nextpage.$lastpage;
	return $returnstr;
}
?>