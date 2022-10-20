function check() {
  var c = 0;
  var q1 = document.mod_quiz.question1.value;
  var q2 = document.mod_quiz.question2.value;
  var q3 = document.mod_quiz.question3.value;

  if (q1 == '1b') {
    c++;
  }
  if (q2 == '2c') {
    c++;
  }
  if (q3 == '3d') {
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
