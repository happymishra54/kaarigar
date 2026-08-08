# TODO - Beautify Login Page

- [x] Analyze codebase and create plan
- [x] Rewrite `resources/views/auth/login.blade.php` to use the existing `auth.css` design system
  - [x] Wrap in `.auth-page` and `.auth-card`
  - [x] Add logo/title/subtitle header
  - [x] Upgrade role selector to `.role-selector` / `.role-option`
  - [x] Style inputs with icons
  - [x] Style submit button with `.auth-btn`
  - [x] Style footer links with `.auth-footer`
  - [x] Keep all existing functionality (alerts, errors, CSRF, form action)
- [x] Add `.input-icon` / `.input-icon-wrap` styles to `resources/css/auth.css`
- [x] Verify page renders correctly (CSS syntax valid; pre-existing build import path issue unrelated to this change)
- [x] Beautify `resources/views/auth/register.blade.php` using the same `auth.css` design system
  - [x] Wrap in `.auth-page` and `.auth-card`
  - [x] Add logo/title/subtitle header
  - [x] Style inputs with icons
  - [x] Style submit button with `.auth-btn`
  - [x] Style footer links with `.auth-footer`
  - [x] Keep all existing functionality (errors, CSRF, form action, hidden role)
