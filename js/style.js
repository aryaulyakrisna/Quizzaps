function setIntersection() {
  const mainObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document.querySelector("main").classList.remove("scale-0");
      }
    });
  });

  mainObserver.observe(document.querySelector("main"));
}

function landingPageImgIntersection() {
  const intersectionObserver1 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (innerWidth >= 1024) {

          document
            .querySelector("#landing-page-img")
            .classList.remove("lg:-translate-x-10", "lg:translate-y-10");
        }
        }
    });
  });

  intersectionObserver1.observe(document.querySelector("#landing-page-img"));
}

function wavesIntersection() {
  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (innerWidth >= 1024) { 
          document.querySelector("#waves").classList.remove("lg:translate-x-24");}
        }
    });
  });


    intersectionObserver.observe(document.querySelector("#waves"));
}

function guestActionIntersection() {
  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
          document
            .querySelector("#guest-action")
            .classList.remove("-translate-x-10", "translate-y-10", "opacity-0");
        }
    });
  });


    intersectionObserver.observe(document.querySelector("#guest-action"));

}
