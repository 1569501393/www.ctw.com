function setRemFontSize(baseSize, baseWidth) {
    var baseSize = baseSize || 20,
        baseWidth = baseWidth || 375,
        clientWidth = document.documentElement.clientWidth;
        clientHeight = document.documentElement.clientHeight;

        var heightX = clientHeight/960;

        if (clientWidth>540) {
            clientWidth=540*heightX;
        }else{
            clientWidth=clientWidth;
        }
    // document.getElementById('mainBody').style.maxWidth = 480 * heightX + 'px';
    document.getElementsByTagName('html')[0].style.fontSize = clientWidth * baseSize / baseWidth + 'px';
    $('.content').css({minHeight:clientHeight});
    // $('.content').hide();
    // $('#mainBody').css(maxWidth:480*heightX);
}
setRemFontSize();
window.addEventListener("resize", function() {
    setTimeout(function() {
        setRemFontSize();
    }, 200)
});