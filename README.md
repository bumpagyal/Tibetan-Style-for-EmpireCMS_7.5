# Tibetan Style for EmpireCMS_7.5
帝国网站管理系统7.5藏文样式补丁，主要针对藏文网站建设用户，在帝国网站管理系统7.5的后台增加支持藏文字体的完美显示。

## 安装说明
- 先安装帝国网站管理系统7.5【简体UTF-8版】[[下载地址]](http://www.phome.net/download/ "帝国软件下载")
- 本项目里的 e 目录上传到网站根目录并覆盖文件
- 升级时如果您改了“e/admin”目录名，请先将目录名改回“e/admin”；（升级完成后再修改回来）
- 升级时如果您改了"e/class/userfun.php"文件，先备份一下然后添加自定义代码

## 藏文 Web fonts 调用方法

前台HTML页面上调用如下代码：
```html
<link rel="stylesheet" href="[!--news.url--]e/extend/tibetan-style/css/base-style.min.css">
<script src="[!--news.url--]e/extend/tibetan-style/js/tibetan-plugin.js"></script>
```

前台CSS样式表文件调用如下代码：
```css
body {
	font-family: Georgia, Times, "Times New Roman", Kokonor, "Tibetan Machine Uni", Jomolhari, serif;
}
```

### 说明
- 本项目采用"Jomolhari"作为默认藏文字体
- 如果需要"Noto Sans Tibetan"藏文字体版本，请在本项目的releases里下载v2.1.4版本
- 如果需要"珠穆朗玛"藏文字体版本，请在本项目的releases里下载v1.0版本
- 增加了对BootStrap 4 中分页样式的支持，如果需要使用请到帝国cms后台，找到【系统】-【系统参数设置】-【信息设置】-【列表分页函数(列表)】，把里面的函数换成【user_ShowListMorePage】函数，内容分页函数换成【user_ShowTextPage】函数
- ecmseditor编辑器增加了藏文字体
- 增加了信息管理列表中的标题字数
- 简体中文语言包里常用的一部分翻译成了藏文

### 附加
如果需要动态页面的分页对BootStrap分页样式，修改 e/class/connect.php 文件里的page1函数为如下代码：
```php
function page1($num,$line,$page_line,$start,$page,$search){
	global $fun_r;
	if($num<=$line)
	{
		return '';
	}
	$search=RepPostStr($search,1);
	$url=eReturnSelfPage(0).'?page';
	$snum=2;//最小页数
	$totalpage=ceil($num/$line);//取得总页数
	$firststr='<li class="page-item class="disabled"><a class="page-link" title="'.$fun_r['trecord'].'" aria-label="Previous">'.$num.'</a></li>';
	//上一页
	if($page<>0)
	{
		$toppage='<li class="page-item"><a class="page-link" href="'.$url.'=0'.$search.'">'.$fun_r['startpage'].'</a></li>';
		$pagepr=$page-1;
		$prepage='<li class="page-item"><a class="page-link" href="'.$url.'='.$pagepr.$search.'">'.$fun_r['pripage'].'</a></li>';
	}
	//下一页
	if($page!=$totalpage-1)
	{
		$pagenex=$page+1;
		$nextpage='<li class="page-item"><a class="page-link" href="'.$url.'='.$pagenex.$search.'">'.$fun_r['nextpage'].'</a></li>';
		$lastpage='<li class="page-item"><a class="page-link" href="'.$url.'='.($totalpage-1).$search.'">'.$fun_r['lastpage'].'</a></li>';
	}
	$starti=$page-$snum<0?0:$page-$snum;
	$no=0;
	for($i=$starti;$i<$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1='<li class="page-item class="active"><a class="page-link" href="#">';
			$is_2='<span class="sr-only">(current)</span></a></li>';
		}
		else
		{
			$is_1='<li class="page-item"><a class="page-link" href="'.$url.'='.$i.$search.'">';
			$is_2="</a></li>";
		}
		$pagenum=$i+1;
		$returnstr.="&nbsp;".$is_1.$pagenum.$is_2;
	}
	$returnstr=$firststr.$toppage.$prepage.$returnstr.$nextpage.$lastpage;
	return $returnstr;
}
```
在模板文件里分页处记得要添加BootStrap分页样式class类，例如：
```html
<nav aria-label="Page navigation example">
	<ul class="pagination justify-content-center">[!--show.page--]</ul>
</nav>
```
