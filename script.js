document.addEventListener('DOMContentLoaded', () => {
    const romanInput = document.getElementById('romanInput');
    const convertButton = document.getElementById('convertButton');
    const resultDiv = document.getElementById('result');
  
    convertButton.addEventListener('click', () => {
      const romanNumeral = romanInput.value;
  
      fetch('roman_to_int.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'romanNumeral=' + encodeURIComponent(romanNumeral)
      })
        .then(response => response.text())
        .then(data => {
          resultDiv.textContent = 'Result: ' + data;
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });
  });
  