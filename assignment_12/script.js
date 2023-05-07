document.getElementById("bmiForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const weight = parseFloat(document.getElementById("weightInput").value);
  const height = parseFloat(document.getElementById("heightInput").value);

  // Calculate the BMI
  const bmi = weight / (height * height);

  // Display the result
  document.getElementById("result").innerText = `Your BMI: ${bmi.toFixed(2)}`;
});
