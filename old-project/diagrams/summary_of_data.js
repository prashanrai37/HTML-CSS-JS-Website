const inputs = document.getElementsByClassName("box");
const btn = document.getElementById("box_input_btn");

const mean = (numbers) =>
  numbers.reduce((acc, cur) => (acc += cur), 0) / numbers.length;

function mode(numbers) {
  return numbers.reduce(
    function (current, item) {
      const val = (current.numMapping[item] =
        (current.numMapping[item] || 0) + 1);
      if (val > current.greatestFreq) {
        current.greatestFreq = val;
        current.mode = item;
      }
      return current;
    },
    { mode: null, greatestFreq: -Infinity, numMapping: {} }
  ).mode;
}

function median(numbers) {
  if (numbers.length === 0) return 0;

  numbers.sort(function (a, b) {
    return a - b;
  });

  const half = Math.floor(numbers.length / 2);

  if (numbers.length % 2) return numbers[half];

  return (numbers[half - 1] + numbers[half]) / 2.0;
}

btn.addEventListener("click", () => {
  const output = document.getElementById("output");
  output.innerHTML = "";
  const numbers = Array.from(inputs).map((i) => parseInt(i.value) || 0);
  output.innerHTML += `<p>Mode: ${mode(numbers)}</p>`;
  output.innerHTML += `<p>Median: ${median(numbers)}</p>`;
  output.innerHTML += `<p>Mean: ${mean(numbers)}</p>`;
});
