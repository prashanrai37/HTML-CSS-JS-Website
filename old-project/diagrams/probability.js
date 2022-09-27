const boxes = document.getElementsByClassName("box");
const input = document.getElementById("box_input");
const btn = document.getElementById("box_input_btn");

btn.addEventListener("click", () => {
  const numberOfBoxes = input.value || 0;
  // Clear all boxes first
  Array.from(boxes).forEach((b) => (b.style.background = "white"));
  // Fill the boxes in with color
  for (let i = 0; i < numberOfBoxes; i++) {
    boxes[i].style.background = "red";
  }
});
