function check() {
  var c = 0;
  var q1 = document.prob_quiz.question1.value;
  var q2 = document.prob_quiz.question2.value;
  var q3 = document.prob_quiz.question3.value;

  if (q1 == '1a') {
    c++;
  }
  if (q2 == '2c') {
    c++;
  }
  if (q3 == '3a') {
    c++;
  }

  if (c < 3) {
    document.getElementById('result').style.backgroundColor = '#fff';
    document.getElementById(
      'result'
    ).innerText = `You got ${c} out of 3. Try again.`;
  } else {
    document.getElementById('result').style.backgroundColor = '#fff';
    document.getElementById(
      'result'
    ).innerText = `Congratulations! You got ${c} out of 3.`;
  }
}

function update(num) {
  onSet = 0;
  counter = 1;

  if (num == 1) {
    if (
      document.getElementById('pbtn-1').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-1').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-1').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 2) {
    if (
      document.getElementById('pbtn-2').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-2').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-2').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 3) {
    if (
      document.getElementById('pbtn-3').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-3').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-3').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 4) {
    if (
      document.getElementById('pbtn-4').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-4').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-4').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 5) {
    if (
      document.getElementById('pbtn-5').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-5').style.backgroundColor = 'green';
      onSet += 1;
      console.log(onSet);
    } else {
      document.getElementById('pbtn-5').style.backgroundColor = 'lightblue';
      onSet -= 1;
      console.log(onSet);
    }
  }

  if (num == 6) {
    if (
      document.getElementById('pbtn-6').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-6').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-6').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 7) {
    if (
      document.getElementById('pbtn-7').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-7').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-7').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 8) {
    if (
      document.getElementById('pbtn-8').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-8').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-8').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 9) {
    if (
      document.getElementById('pbtn-9').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-9').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-9').style.backgroundColor = 'lightblue';
    }
  }

  if (num == 10) {
    if (
      document.getElementById('pbtn-10').style.backgroundColor == 'lightblue'
    ) {
      document.getElementById('pbtn-10').style.backgroundColor = 'green';
    } else {
      document.getElementById('pbtn-10').style.backgroundColor = 'lightblue';
    }
  }

  while (counter < 11) {
    if (
      document.getElementById(`pbtn-${counter}`).style.backgroundColor ==
      'green'
    ) {
      onSet += 1;
      console.log(onSet);
    }

    counter += 1;
  }

  document.getElementById('percentage-placeholder').innerText = `${
    (onSet / 10) * 100
  }%`;

  document.getElementById('decimal-placeholder').innerText = `${onSet / 10}`;

  document.getElementById('fraction-placeholder').innerText = `${onSet}/10`;
}
