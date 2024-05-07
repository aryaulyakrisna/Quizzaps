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

