document.addEventListener('keydown', (event) => {
  // Shortcut to dashboard
  if (event.ctrlKey && event.altKey && event.key === 'd') {
    event.preventDefault();
    window.location.href = '/app';
  }
  // Shortcut to modul
  if (event.ctrlKey && event.altKey && event.key === 'm') {
    event.preventDefault();
    window.location.href = '/app/e-learning/modul';
  }
  // Shortcut to task
  if (event.ctrlKey && event.altKey && event.key === 't') {
    event.preventDefault();
    window.location.href = '/app/e-learning/task';
  }
  // Shortcut to meeting
  if (event.ctrlKey && event.altKey && event.key === 'p') {
    event.preventDefault();
    window.location.href = '/app/e-learning/meeting';
  }
  // Shortcut to presence
  if (event.ctrlKey && event.altKey && event.key === 'b') {
    event.preventDefault();
    window.location.href = '/app/presence';
  }
  // Shortcut to member
  if (event.ctrlKey && event.altKey && event.key === 'a') {
    event.preventDefault();
    window.location.href = '/app/member';
  }
  // Shortcut to report
  if (event.ctrlKey && event.altKey && event.key === 'l') {
    event.preventDefault();
    window.location.href = '/app/report';
  }
});
