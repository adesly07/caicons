document.addEventListener("DOMContentLoaded", function () {
    const generatedNumber = document.getElementById("generatedNumber");
    const randomNum = Math.floor(1000 + Math.random() * 9000);  // 4-digit random number
    generatedNumber.value = randomNum;
  });
  