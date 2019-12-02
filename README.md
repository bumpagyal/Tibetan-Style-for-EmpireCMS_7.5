# Tibetan Style for EmpireCMS_7.5
帝国网站管理系统7.5藏文样式补丁，主要针对藏文网站建设用户，在帝国网站管理系统7.5的后台增加支持藏文字体的完美显示。

## 安装说明
- 先安装帝国网站管理系统7.5【简体UTF-8版】[[下载地址]](http://www.phome.net/download/ "帝国软件下载")
- 本项目里的 e 目录上传到网站根目录并覆盖文件

## 藏文 Web Fonts 调用方法
本项目采用了有字库提供的Webfont字体Microsoft Himalaya关于这款藏文字体的详细资料可以访问[https://cdn.res.webfont.com/fonts/47809.html](https://cdn.res.webfont.com/fonts/47809.html "https://cdn.res.webfont.com/fonts/47809.html")阅读了解更多。

前台CSS样式表文件调用如下代码：
```css
/* tibetan */
@font-face {
	font-family: 'Microsoft Himalaya';
	font-style: normal;
	font-weight: 400;
	src: url('//cdn.repository.webfont.com/webfonts/nomal/3041/47809/5de1e7cef629d80f0078ff0d.gif?r=123479631126');
	src: url('//cdn.repository.webfont.com/webfonts/nomal/3041/47809/5de1e7cef629d80f0078ff0d.gif?r=123479631126?#iefix') format('embedded-opentype'),
		 url('//cdn.repository.webfont.com/webfonts/nomal/3041/47809/5de1e7cef629d80f0078ff0d.png?r=123479631126') format('woff2'),
		 url('//cdn.repository.webfont.com/webfonts/nomal/3041/47809/5de1e7cef629d80f0078ff0d.bmp?r=123479631126') format('woff'),
		 url('//cdn.repository.webfont.com/webfonts/nomal/3041/47809/5de1e7cef629d80f0078ff0d.jpg?r=123479631126') format('truetype');
}
body {
	font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Kokonor,Kailasa,"Microsoft Himalaya",sans-serif;
}
```

### 说明
- 如果需要珠穆朗玛藏文字体版本，请在本项目的releases里下载v1.0版本
- 增加了对BootStrap分页样式的支持，如果需要使用请到帝国cms后台，找到【系统】-【系统参数设置】-【信息设置】-【列表分页函数(列表)】，把里面的函数换成【user_ShowListMorePage】函数
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
	$firststr='<li class="disabled"><a title="'.$fun_r['trecord'].'" aria-label="Previous">'.$num.'</a></li>';
	//上一页
	if($page<>0)
	{
		$toppage='<li><a href="'.$url.'=0'.$search.'">'.$fun_r['startpage'].'</a></li>';
		$pagepr=$page-1;
		$prepage='<li><a href="'.$url.'='.$pagepr.$search.'">'.$fun_r['pripage'].'</a></li>';
	}
	//下一页
	if($page!=$totalpage-1)
	{
		$pagenex=$page+1;
		$nextpage='<li><a href="'.$url.'='.$pagenex.$search.'">'.$fun_r['nextpage'].'</a></li>';
		$lastpage='<li><a href="'.$url.'='.($totalpage-1).$search.'">'.$fun_r['lastpage'].'</a></li>';
	}
	$starti=$page-$snum<0?0:$page-$snum;
	$no=0;
	for($i=$starti;$i<$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1='<li class="active"><a href="#">';
			$is_2='<span class="sr-only">(current)</span></a></li>';
		}
		else
		{
			$is_1='<li><a href="'.$url.'='.$i.$search.'">';
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
<nav class="pagination-wrap text-center">
	<ul class="pagination">[!--show.page--]</ul>
</nav>
```