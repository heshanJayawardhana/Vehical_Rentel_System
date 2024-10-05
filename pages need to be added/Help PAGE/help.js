document.getElementById('issueForm').addEventListener('submit', function(event) {
  event.preventDefault();
  
  // Get the comments
  const comments = document.getElementById('comments').value;
  
  if (comments.trim() === "") {
      alert("Please enter your issues or concerns before submitting.");
      return;
  }
  
  // Perform a simple alert to simulate form submission
  alert("Your issues and concerns have been submitted: " + comments);
  
  // Clear the form
  document.getElementById('issueForm').reset();
});

const issueButton = document.getElementById('issue-button');
const issueForm = document.getElementById('issue-form');

issueButton.addEventListener('click', () => {
  issueForm.style.display = 'block';
});

