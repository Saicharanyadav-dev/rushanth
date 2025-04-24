document.addEventListener("DOMContentLoaded", () => {
  const applicationModal = document.getElementById("applicationModal");
  const applyButtons = document.querySelectorAll(".apply-btn");
  const closeBtns = document.querySelectorAll(".modal .close");
  const jobRoleInput = document.getElementById("jobRole");
  const jobForm = document.getElementById("jobApplicationForm");
  const searchInput = document.getElementById("branchSearch");
  const navLinks = document.querySelectorAll(".navbar nav ul li a");

  const loginModal = document.getElementById("loginModal");
  const registerModal = document.getElementById("registerModal");

 

  // Open application modal and set job role
  applyButtons.forEach(button => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const role = button.getAttribute("data-role") || "Unknown Position";
      if (jobRoleInput) jobRoleInput.value = role;
      if (applicationModal) applicationModal.style.display = "flex";
    });
  });

  // Close modals on close button click
  closeBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      if (applicationModal) applicationModal.style.display = "none";
      if (loginModal) loginModal.style.display = "none";
      if (registerModal) registerModal.style.display = "none";
      if (jobForm) jobForm.reset();
    });
  });

  // Close modals when clicking outside modal content
  window.addEventListener("click", (e) => {
    if (e.target === applicationModal) {
      applicationModal.style.display = "none";
      if (jobForm) jobForm.reset();
    }
    if (e.target === loginModal) loginModal.style.display = "none";
    if (e.target === registerModal) registerModal.style.display = "none";
  });

  // Handle fake job form submission
  if (jobForm) {
    jobForm.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Your application has been submitted successfully!");
      applicationModal.style.display = "none";
      jobForm.reset();
    });
  }

  
