// Basic interactive behaviors using jQuery
$(function() {
  const $body = $(document.body);
  const $year = $('#year');
  const $navToggle = $('.nav-toggle');
  const $navMenu = $('#navMenu');
  const $themeToggle = $('#themeToggle');

  // Set current year
  $year.text(new Date().getFullYear());

  // Mobile nav toggle
  $navToggle.on('click', function() {
    const isOpen = $navMenu.hasClass('open');
    $navMenu.toggleClass('open');
    $(this).attr('aria-expanded', String(!isOpen));
  });

  // Theme toggle (dark / light)
  $themeToggle.on('click', function() {
    const current = $body.attr('data-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    $body.attr('data-theme', next);
    $(this).attr('aria-pressed', String(next === 'dark'));
    $(this).text(next === 'dark' ? 'Light Mode' : 'Dark Mode');
    localStorage.setItem('pref-theme', next);
  });

  // Initialize theme from localStorage
  const storedTheme = localStorage.getItem('pref-theme');
  if (storedTheme) {
    $body.attr('data-theme', storedTheme);
    $themeToggle.text(storedTheme === 'dark' ? 'Light Mode' : 'Dark Mode');
    $themeToggle.attr('aria-pressed', String(storedTheme === 'dark'));
  } else {
    $body.attr('data-theme', 'light');
  }

  // Collapsible sections
  $('.collapsible').each(function() {
    const $section = $(this);
    const $toggle = $section.find('.collapse-toggle');
    const targetId = $toggle.attr('aria-controls');
    const $content = $('#' + targetId);

    $toggle.on('click', function() {
      const expanded = $toggle.attr('aria-expanded') === 'true';
      $toggle.attr('aria-expanded', String(!expanded));
      $toggle.text(expanded ? 'Show' : 'Hide');
      if (expanded) {
        $content.attr('hidden', '');
      } else {
        $content.removeAttr('hidden');
      }
    });
  });

  // Print resume button
  $('#printResume').on('click', function() {
    window.print();
  });
});
