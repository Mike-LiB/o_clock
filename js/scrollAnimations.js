var btnScroll = document.getElementById('btnScroll');

function scrollDown () {
    window.scroll(0, 600);
}

btnScroll.onclick = scrollDown;

AOS.init({
    duration: 600,
    once: true
});