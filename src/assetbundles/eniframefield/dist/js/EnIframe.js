function getFrameByEvent(event) {
  return [].slice
    .call(document.getElementsByTagName("iframe"))
    .filter(function (iframe) {
      return iframe.contentWindow === event.source;
    })[0];
}
window.onmessage = (e) => {
// console.log({source:
//     e.source, data: e.data});
  var iframe = getFrameByEvent(e);
  if (iframe) {
    if (e.data.hasOwnProperty("frameHeight")) {
      iframe.style.height = `${e.data.frameHeight}px`;
      // console.log("Parent Script Setting Height To", e.data.frameHeight);
    } else if (e.data.hasOwnProperty("scroll") && e.data.scroll > 0) {
      // e.data.scroll will be the iframe offset to scroll, 1 = top of the iframe
      const elDistanceToTop =
        window.pageYOffset + iframe.getBoundingClientRect().top;
      let scrollTo = elDistanceToTop + e.data.scroll;

      window.scrollTo({
        top: scrollTo,
        left: 0,
        behavior: "smooth",
      });
      console.log("Scrolling Window To", scrollTo);
    }
  }
};

window.onload = e => {
  let frames = document.getElementsByClassName('en-iframe');
  for(let i=0; i<frames.length; i++){
    let src = frames[i].getAttribute('data-src');
    frames[i].setAttribute('src',src);
  }
}
