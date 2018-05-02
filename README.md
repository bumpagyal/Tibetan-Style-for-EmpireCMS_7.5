# EmpireCMS_7.5_SC_UTF8-Tibetan-Update
帝国网站管理系统7.5藏文版，主要针对藏文网站建设用户，在帝国网站管理系统7.5的后台增加支持藏文字体的完美显示。

## 安装说明
- 先安装帝国网站管理系统7.5【简体UTF-8版】[[下载地址]](http://www.phome.net/download/ "帝国软件下载")
- 本项目里的 e 目录上传到网站根目录并覆盖文件

## 修改记录
- 修改了列表模板之列表式分页（采用了BootStrap分页样式）
- ecmseditor编辑器增加了藏文字体
- 增加了信息管理列表中的标题字数

## 藏文 Web Fonts 调用方法
本项目集成了两种藏文 Web Fonts 字体以及相对应的文件，字体分别为：珠穆朗玛—乌金萨钦体、珠穆朗玛—乌金萨琼体。关于这两款藏文字体的详细资料可以[点击这里](http://yalasoo.com/Chinese/docs/yalasoo_cn_qomolangma_fonts.html "珠穆朗玛系列藏文字体")阅读。
<br>
模板样式表调用代码：
```
@import url("/e/extend/tibetan-style/tibetan-font.css");
```