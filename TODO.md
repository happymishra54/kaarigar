# TODO - Admin users/workers separation

- [x] Add internal “Users” and “Manage Workers” panels on `resources/views/admin/dashboard.blade.php` so each selection shows only that dataset.
- [x] Update `app/Http/Controllers/Admin/DashboardController.php` to pass filtered `users` (customer+admin) and `workers` (role=worker) lists to the dashboard.
- [x] Ensure “Users” panel uses the same columns/logic as `resources/views/admin/users/index.blade.php` (including status toggle/delete actions).
- [x] Ensure “Manage Workers” panel uses the same columns/logic as `resources/views/admin/workers/index.blade.php`.
- [ ] Verify no mixed rendering occurs when switching panels.


