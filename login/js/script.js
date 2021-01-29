const switchBtn = document.querySelectorAll(".switch button");
const section = document.querySelector("section:last-of-type");
const leftForm = document.querySelector("form");
const rightForm = document.querySelector("section:last-of-type form");
const leftImg = document.querySelector("img");
const rightImg = document.querySelector("section:last-of-type img");

switchBtn.forEach((button) => {
	button.addEventListener("click", () => {
		section.classList.toggle("sVisible");
		leftForm.classList.toggle("invisible");
		leftImg.classList.toggle("invisible");
		rightForm.classList.toggle("visible");
		rightImg.classList.toggle("visible");
	});
});
