##微信公众号消息api库##
###功能###
本项目主要是实现对微信公众号的一些接口的封装，实现通过后台程序向某些微信账号发送消息的功能。主要封装了获取公众号access_token，发送客服消息，发送模板消息的功能。
<li>
需要申请微信开放平台测试号，http://mp.weixin.qq.com/debug/cgi-bin/sandboxinfo?action=showinfo&t=sandbox/index。</li>
<li>需要用户的微信账号关注测试号</li>

###目录结构###
source：主要的源代码，可以当库来使用。需要php支持curl扩展
demo：主要的example程序，可以直接 php xxx运行。需要替换wechatConstants.php的appid和secret。