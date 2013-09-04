//Must have
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//cdn.zopim.com/?VFTJj9YzpezsD2DIe9fDVPUlxBmWZAFV';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

//Optional to toggle from chat to send message
$zopim(function() {$zopim.livechat.setOnStatus(change_chat_img);});

function change_chat_img(status) {
var img = document.getElementById('chat_img');
if (status=='online')
img.src = '/images/chat-live-button.png';
else if (status=='away')
img.src = '/images/send-msg-btn.png';
else if (stats==='offline')
img.src = '/images/send-msg-btn.png';
}