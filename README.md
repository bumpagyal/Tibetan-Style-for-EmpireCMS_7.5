# Tibetan Style for EmpireCMS_7.5
帝国网站管理系统7.5藏文样式补丁，主要针对藏文网站建设用户，在帝国网站管理系统7.5的后台增加支持藏文字体的完美显示。

## 安装说明
- 先安装帝国网站管理系统7.5【简体UTF-8版】[[下载地址]](http://www.phome.net/download/ "帝国软件下载")
- 本项目里的 e 目录上传到网站根目录并覆盖文件

## 藏文 Google Fonts 调用方法
本项目集成了藏文 Google Fonts 字体以及相对应的文件，字体为：Noto Sans Tibetan。关于这款藏文字体的详细资料可以[点击这里](https://fonts.google.com/earlyaccess#Noto+Sans+Tibetan "Noto Sans Tibetan (Tibetan)")阅读。

前台模板里调用 Google Fonts 代码为：
```css
@import url("/e/extend/tibetan-style/notosanstibetan.css");
```

或者模板文件里添加以下 HTML 代码：
```html
<link rel="stylesheet" href="/e/extend/tibetan-style/notosanstibetan.css">
```

样式表文件里调用代码，例如：
```css
font-family: "Helvetica Neue", Helvetica, Arial, "Noto Sans Tibetan", sans-serif;
```

### 说明
- 修改了列表模板之列表式分页（采用了BootStrap分页样式，如果不适用于自己的模板或框架，请自行修改 \e\class\t_functions.php 文件）
- ecmseditor编辑器增加了藏文字体
- 增加了信息管理列表中的标题字数
- 简体中文语言包里常用的一部分翻译成了藏文