# Tibetan Style for EmpireCMS_7.5
帝国网站管理系统7.5藏文样式补丁，主要针对藏文网站建设用户，在帝国网站管理系统7.5的后台增加支持藏文字体的完美显示。

## 安装说明
- 先安装帝国网站管理系统7.5【简体UTF-8版】[[下载地址]](http://www.phome.net/download/ "帝国软件下载")
- 本项目里的 e 目录上传到网站根目录并覆盖文件

## 藏文 Web Fonts 调用方法
本项目集成了藏文 Web Fonts 字体以及相对应的文件，字体为：Qomolangma-Uchen Sarchen。关于这款藏文字体的详细资料可以[点击这里](http://www.yalasoo.com/Chinese/docs/yalasoo_cn_qomolangma_fonts.html "Qomolangma-Uchen Sarchen (Tibetan)")阅读。

前台CSS样式表文件调用如下代码：
```css
@font-face{font-family:'Qomolangma-Uchen Sarchung';src:local('Qomolangma-Uchen Sarchung'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchung.woff2') format('woff2'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchung.woff') format('woff'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchung.ttf') format('truetype'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchung.eot') format('embedded-opentype');unicode-range:U+0F00-0FFF}
@font-face{font-family:'Qomolangma-Uchen Sarchen';src:local('Qomolangma-Uchen Sarchen'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchen.woff2') format('woff2'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchen.woff') format('woff'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchen.ttf') format('truetype'),url('../../../e/extend/tibetan-style/fonts/Qomolangma-UchenSarchen.eot') format('embedded-opentype');unicode-range:U+0F00-0FFF}
```

或者模板文件里添加以下 HTML 代码：
```html
<link rel="stylesheet" href="/e/extend/tibetan-style/tibetan-fonts.css">
```

样式表文件里调用代码，例如：
```css
font-family: "Qomolangma-Uchen Sarchung", Georgia, "Times New Roman", Times, serif;
```
或
```css
font-family: "Qomolangma-Uchen Sarchen", "Helvetica Neue", Helvetica, Arial, sans-serif;
```

### 说明
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