Table of Contents
=================

- [[Sitemap|sitemap]]
- Pages by usage
    - [Public](#public-pages)
    - [Management](#management-pages)
    - [Redirect](#redirect-pages)
    - [API](#api-pages)
    - [File](#file-pages)
    - [Other](#other-pages)
- Widgets
    - [[News Archive|widget-news_archive]]
    - [[News Tag list|widget-news_tag-list]]

Public pages
------------

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| Common | Home page | [[site/index|action-site_index]] | [`/`](http://yiiframework.domain-na.me/) | |
| Search | Search | [[search/global|action-search_global]] | [`/search`](http://yiiframework.domain-na.me/search) | |
| User | Login | [[site/login|action-site_login]] | [`/login`](http://yiiframework.domain-na.me/login) | |
| User | Logout | [[site/logout|action-site_logout]] | [`/logout`](http://yiiframework.domain-na.me/logout) | |
| User | Signup | [[site/signup|action-site_signup]] | [`/signup`](http://yiiframework.domain-na.me/signup) | |
| User | Request Password Reset | [[site/request-password-reset|action-site_request-password-reset]] | - | |
| User | Password | [[site/reset-password|action-site_reset-password]] | - | |
| About | Contact Us | [[site/contact|action-site_contact]] | [`/contact`](http://yiiframework.domain-na.me/contact) | |
| About | License | [[site/license|action-site_license]] | [`/license`](http://yiiframework.domain-na.me/license) | |
| About | Team | [[site/team|action-site_team]] | [`/team`](http://yiiframework.domain-na.me/team) | |
| About | Terms of services | [[site/tos|action-site_tos]] | [`/tos`](http://yiiframework.domain-na.me/tos) | |
| About | Features | - | - | |
| About | Performance | - | - | |
| Downloads | Official Logo | [[site/logo|action-site_logo]] | [`/logo`](http://yiiframework.domain-na.me/logo) | |
| Downloads | Download Yii | [[site/download|action-site_download]] | [`/download`](http://yiiframework.domain-na.me/download) | |
| News | News | [[news/index|action-news_index]] | [`/news`](http://yiiframework.domain-na.me/news) | |
| News | News Article | [[news/view|action-news_view]] | [`/news/<id:/d+>/<name>`](http://yiiframework.domain-na.me/news/1/extension-repository-system-is-ready) | |
| Development | Contribute | [[site/contribute|action-site_contribute]] | [`/contribute`](http://yiiframework.domain-na.me/contribute) | |
| Development | Latest Updates | - | - | |
| Support | Report Bug | [[site/report-issue|action-site_report-issue]] | [`/report-issue`](http://yiiframework.domain-na.me/report-issue) | |
| Support | Report Security Issue | [[site/security|action-site_security]] | [`/security`](http://yiiframework.domain-na.me/security) | |
| Community | Live Chat | [[site/chat|action-site_chat]] | [`/chat`](http://yiiframework.domain-na.me/chat) | |
| Community | Hall of Fame | - | - | |
| Community | Badges | - | - | |
| Forum | Forums | - | [/forum](http://www.yiiframework.com/forum/) | |
| Learn | Books | [[site/books|action-site_books]] | [`/books`](http://yiiframework.domain-na.me/books) | |
| Learn | Resources | [[site/resources|action-site_resources]] | [`/resources`](http://yiiframework.domain-na.me/resources) | |
| Learn | Tutorials | - | - | |
| Documentation | Tour | [[site/tour|action-site_tour]] | [`/tour`](http://yiiframework.domain-na.me/tour) | |
| Documentation | Wiki | [[site/wiki|action-site_wiki]] | [`/wiki`](http://yiiframework.domain-na.me/wiki) | |
| Documentation | Guides & Blog articles | [[guide/index|action-guide_index]] | [`/doc/<type:guide|blog>/<version://d//.//d>/<language:[//w//-]+>`](http://yiiframework.domain-na.me/doc/guide/2.0/en) | |
| Documentation | Guide | [[guide/view|action-guide_view]] | [`/doc/<type:guide|blog>/<version://d//.//d>/<language:[//w//-]+>/<section:[a-z0-9//.//-]+>`](http://yiiframework.domain-na.me/doc/guide/2.0/en/intro-yii) | |
| Documentation | API Documentation | [[api/index|action-api_index]] | [`/doc/api/<version:\\d\\.\\d>`](http://yiiframework.domain-na.me/doc/api/2.0) | |
| Documentation | API Class Members | [[api/class-members|action-api_class-members]] | [`/doc/api/class-members`](http://yiiframework.domain-na.me/doc/api/class-members) | |
| Documentation | API Section View | [[api/view|action-api_view]] | [`/doc/api/<version:\\d\\.\\d>/<section:.+>`](http://yiiframework.domain-na.me/doc/api/2.0/yii-baseyii) | |
| Documentation | Screencasts | - | - | |
| Extensions | Extensions | [[extensions/index|action-extensions_index]] | [`/extensions`](http://yiiframework.domain-na.me/extensions) [`/extensions/page/<page:\d+>`](http://yiiframework.domain-na.me/extensions/page/2) | |
| Extensions | Extension | [[extensions/package|action-extensions_package]] | [`/extensions/package/<vendorName:[\w\-\.]+>/<packageName:[\w\-\.]+>`](http://yiiframework.domain-na.me/extensions/package/yiisoft/yii2-gii) | |

Management pages
----------------

Management pages server for content management needs acessible only with special permissions.

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| News | News admin | [[news/admin|action-news_admin]] | [`/news/admin`](http://yiiframework.domain-na.me/news/admin) | |
| News | Create news article | [[news/create|action-news_create]] | [`/news/create`](http://yiiframework.domain-na.me/news/create) | |
| News | Update existing news article | [[news/update|action-news_update]] | [`/news/update?id=<id>`](http://yiiframework.domain-na.me/news/update?id=1) | |
| News | Delete existing news article | [[news/delete|action-news_delete]] | [`/news/delete?id=<id>`](http://yiiframework.domain-na.me/news/delete?id=1) | |

Redirect pages
--------------

Redirect pages are bridge-type pages, that redirects to other pages.

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| Common | Redirect Page | [[site/redirect|action-site_redirect]] | [`/<url:doc/terms>`](http://yiiframework.domain-na.me/doc/terms) [`/<url:about|performance|demos|doc>`](http://yiiframework.domain-na.me/about) | |
| News | News Article by ID | [[news/view|action-news_view]] | [`/news/<id:/d+>`](http://yiiframework.domain-na.me/news/1) | |
| Documentation | Guide Page Redirect | [[guide/redirect|action-guide_redirect]] | [`/doc-2.0/guide-<section:[A-z0-9\\.\\-]+>.html`](http://yiiframework.domain-na.me/doc-2.0/guide-intro-yii.html) | |
| Documentation | Guide short url entry | [[guide/entry|action-guide_entry]] | [`/doc/guide/<version:\\d\\.\\d>`](http://yiiframework.domain-na.me/doc/guide/2.0) [`/doc/guide`](http://yiiframework.domain-na.me/doc/guide) | |
| Documentation | Blog short url entry | [[guide/blog-entry|action-guide_blog-entry]] | [`/doc/blog/<version:\\d\\.\\d>`](http://yiiframework.domain-na.me/doc/blog/2.0) [`/doc/blog`](http://yiiframework.domain-na.me/doc/blog) | |
| Documentation | API Documentation entry | [[api/entry|action-api_entry]] | [`/doc/api`](http://yiiframework.domain-na.me/doc/api) | |
| Documentation | API Page Redirect | [[api/redirect|action-api_redirect]] | [`/doc-2.0/<section:.+>.html`](http://yiiframework.domain-na.me/doc-2.0/yii-baseyii.html) | |

API pages
---------

API pages are able to respond to requests in JSON and other machine-friendly formats.

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| News | List news tags | [[news/list-tags|action-news_list-tags]] | [`/news/list-tags?query=<name>`](http://yiiframework.domain-na.me/news/list-tags?query=yii-2-0) | |
| Search | Search Suggestions | [[search/suggest|action-search_suggest]] | [`/search/suggest`](http://yiiframework.domain-na.me/search/suggest) | |
| Search | Search Auto-complete | [[search/as-you-type|action-search_as-you-type]] | [`/search/as-you-type`](http://yiiframework.domain-na.me/search/as-you-type) | |
| Search | Extension search | [[search/extension|action-search_extension]] | [`/search/extension`](http://yiiframework.domain-na.me/search/extension) | |
| Documentation | API Documentation | [[api/index|action-api_index]] | [`/doc/api/<version:\\d\\.\\d>`](http://yiiframework.domain-na.me/doc/api/2.0) | |
| Documentation | API Class Members | [[api/class-members|action-api_class-members]] | [`/doc/api/class-members`](http://yiiframework.domain-na.me/doc/api/class-members) | |
| Documentation | API Section View | [[api/view|action-api_view]] | [`/doc/api/<version:\\d\\.\\d>/<section:.+>`](http://yiiframework.domain-na.me/doc/api/2.0/yii-baseyii) | |
| Documentation | API Documentation entry | [[api/entry|action-api_entry]] | [`/doc/api`](http://yiiframework.domain-na.me/doc/api) | |

File pages
----------

File pages returns stream of either image or other file.

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| Common | Captcha | [[site/captcha|action-site_captcha]] | [`/captcha`](http://yiiframework.domain-na.me/captcha) | |
| Common | File Download | [[site/file|action-site_file]] | [`/download/<category:[\w-]+>/<file:[\w\d-.]+>`](http://yiiframework.domain-na.me/download/docs-offline/.gitignore) | |
| Documentation | Guide & Blog article Image | [[guide/image|action-guide_image]] | [`/doc/<type:guide|blog>/<version://d//.//d>/<language:[//w//-]+>/images/<image>`](http://yiiframework.domain-na.me/doc/guide/2.0/en/images/application-structure.png) | |
| Documentation | Guide Download | [[guide/download|action-guide_download]] | [`/doc/download/yii-guide-<version://d//.//d>-<language:[//w//-]+>.<format:pdf>`](http://yiiframework.domain-na.me/doc/download/yii-guide-2.0-en.pdf) [`doc/download/yii-docs-<version:\\d\\.\\d>-<language:[\\w\\-]+>.<format:tar\\.gz|tar\\.bz2>`](http://yiiframework.domain-na.me/doc/download/yii-docs-2.0-en.tar.gz) | |

Other pages
----------

Other pages serve complex purposes and are able to be used in different ways.

| Category | Title | Route | URL | State |
|----------|-------|-------|-----|:-----:|
| Common | Error page | [[site/error|action-site_error]] | [`/404-error`](http://yiiframework.domain-na.me/404-error) | |
| User | Auth | [[site/auth|action-site_auth]] | [`/auth`](http://yiiframework.domain-na.me/auth) | |
