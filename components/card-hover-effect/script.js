/**
 * Pointer-based hover animation for interactive cards.
 *
 * Purpose: Adds smooth translations that follow the cursor to emphasise key elements.
 * Usage context: Apply to modules with the `.js-hover-move` class within Divi layouts.
 * Author: André Marinho
 * Website: andremarinho.me
 * Version: 1.0.1
 *
 * @package DST_Card_Hover_Effect
 */
window.addEventListener('DOMContentLoaded', () => {
  const elements = document.querySelectorAll('.js-hover-move');
  if (!elements.length) {
    return;
  }

  elements.forEach((element) => {
    element.style.transition = 'transform 0.2s ease-out';
    element.style.transformOrigin = 'center center';

    element.addEventListener('mousemove', (event) => {
      const rect = element.getBoundingClientRect();
      const px = (event.clientX - rect.left) / rect.width - 0.5;
      const py = (event.clientY - rect.top) / rect.height - 0.5;
      const moveX = px * 20;
      const moveY = py * 20;
      element.style.transform = `translate(${moveX}px, ${moveY}px)`;
    });

    element.addEventListener('mouseleave', () => {
      element.style.transform = 'translate(0, 0)';
    });
  });
});
