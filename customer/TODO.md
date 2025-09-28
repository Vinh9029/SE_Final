# TODO: Implement Back-end for User Account

## Steps Completed

1. **Alter Database Schema** ✅
   - Add `date_of_birth` (DATE NULL) and `gender` (VARCHAR(10) DEFAULT NULL) columns to the `users` table.
   - Run the following SQL in phpMyAdmin or via command:
     ```sql
     ALTER TABLE users ADD COLUMN date_of_birth DATE NULL;
     ALTER TABLE users ADD COLUMN gender VARCHAR(10) DEFAULT NULL;
     ```

2. **Update account.php** ✅
   - Fetch user data (full_name, email) from the database using $_SESSION['user_id'].
   - Fetch loyalty points from the loyalty_points table.
   - Replace hardcoded values in the sidebar with dynamic data.

3. **Update profile.php** ✅
   - Add PHP logic at the top to handle POST requests for updating user profile.
   - Fetch user data from the database and populate form fields.
   - Include validation, success/error messages, and redirect after update.

4. **Update settings.php** ✅
   - Add PHP logic to handle POST requests for changing email and password.
   - Validate current password, check email uniqueness, hash new password.
   - Include success/error messages.

5. **Test Functionality**
   - Start XAMPP (Apache and MySQL).
   - Login as a customer user.
   - Navigate to account.php, update profile and settings.
   - Verify changes in the database and UI.

## Notes
- Ensure all database queries use prepared statements for security.
- Use password_verify for password checks and password_hash for updates.
- Handle AJAX loading properly with dynamic content.
