$('.animate').on('click', function (e) {
        var el = $(e.target);
        if (el[0].tagName.toLowerCase() == 'img') {
            el = el.parent();
        }
        var animateElements = el.parent().find('.animate');
        animateElements.removeClass('active');
        el.addClass('active');
        var img = el.find('img');
        var url = img.attr('src');
        var target = el.attr('data-target');
        $(target).attr('src', url);
    });

$(function () {
    $('body').on('click','.add-to-order',function(){
        var productId = $(this).data('good-id');
        var orderId = $(this).data('order-id');
        var src = '' + orderId + '&tovar_id=' + productId;
        $('<iframe width="0" height="0" border="0" src="'+src+'" id="query"></iframe>').appendTo($(document.body));
        $(this).removeClass('btn-success').addClass('btn-warning').html('Товар добавлен').prop('disabled',true);
        $('#query').on('load', function(){             
            $('#query').remove();
        });       
    });
});

var i, c, y, v, s, n;
v = document.getElementsByClassName("youtube");
if (v.length > 0) {
    s = document.createElement("style");
    s.type = "text/css";
    s.innerHTML = '.video-container{height:0;position:relative;padding-bottom:57.7%;}.video-container iframe, .video-container object, .video-container embed{position:absolute;display:block;width:100%;height:100%;top:0;left:0;}.youtube{position:absolute;left:0;top:0;width:100%;max-width:100%;height:100%;background-color:#000;overflow:hidden;cursor:hand;cursor:pointer;}.youtube .thumb{bottom:0;display:block;left:0;margin:auto;max-width:100%;position:absolute;right:0;top:0;width:100%;height:auto}.youtube .play{filter:alpha(opacity=80);opacity:.8;height:77px;left:50%;margin-left:-38px;margin-top:-38px;position:absolute;top:50%;width:77px;background:url("success/img/youtube-play-icon.png") no-repeat}';
    document.body.appendChild(s)
}
for (n = 0; n < v.length; n++) {
    y = v[n];
    i = document.createElement("img");
    i.setAttribute("src", "https://i.ytimg.com/vi/" + y.id + "/hqdefault.jpg");
    i.setAttribute("class", "thumb");
    c = document.createElement("div");
    c.setAttribute("class", "play");
    y.appendChild(i);
    y.appendChild(c);
    y.onclick = function() {
        var a = document.createElement("iframe");
        a.setAttribute("src", "https://www.youtube.com/embed/" + this.id + "?autoplay=1&rel=0&showinfo=0&border=0&wmode=opaque&enablejsapi=1");
        a.setAttribute("allowfullscreen","");
        a.style.width = this.style.width;
        a.style.height = this.style.height;
        this.parentNode.replaceChild(a, this)
    }
};