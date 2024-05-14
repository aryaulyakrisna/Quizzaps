function setIntersection() {
  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document.querySelector("main").classList.remove("scale-0");
      }
    });
  });

  intersectionObserver.observe(document.querySelector("main"));
}

function landingPageImgIntersection() {
  const intersectionObserver1 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document
          .querySelector("#landing-page-img")
          .classList.remove("min-lg:-translate-x-10", "min-lg:translate-y-10");
      }
    });
  });

  const w = window.innerWidth();
  if (w > 512) {
    intersectionObserver1.observe(document.querySelector("#landing-page-img"));
  }
}

function wavesIntersection() {
  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document.querySelector("#waves").classList.remove("min-lg:translate-x-24");
      }
    });
  });

  const w = window.innerWidth();
  if (w > 512) {
    intersectionObserver.observe(document.querySelector("#waves"));
  }
}

function guestActionIntersection() {
  const intersectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document
          .querySelector("#guest-action")
          .classList.remove("min-lg:-translate-x-10", "min-lg:translate-y-10", "min-lg:opacity-0");
      }
    });
  });

  const w = window.innerWidth();
  if (w > 512) {
    intersectionObserver.observe(document.querySelector("#guest-action"));
  }
}
