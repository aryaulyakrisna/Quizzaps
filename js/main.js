const btnNext = document.querySelector("#btn-next");
const btnPrev = document.querySelector("#btn-prev");
const btnSubmit = document.querySelector("#btn-submit");
let step = document.getElementById("step");

// move to next step

btnNext.addEventListener("click", () => {
  if (step.nextElementSibling) {
    const nextStep = step.nextElementSibling;
    step.classList.add("hidden");
    nextStep.classList.remove("hidden");

    step = nextStep;

    if (!nextStep.nextElementSibling) {
      btnNext.classList.add("hidden");
      btnSubmit.classList.remove("hidden");

    }
  } 
});


// move to prev step

btnPrev.addEventListener("click", () => {
  if (step.previousElementSibling) {
    const preStep = step.previousElementSibling;
    step.classList.add("hidden");
    preStep.classList.remove("hidden");

    if (btnNext.classList.contains("hidden")) {
      btnSubmit.classList.add("hidden");
      btnNext.classList.remove("hidden");
    }

    step = preStep;
  } else {
    window.location.href = "./quizes.php"
  }
});

