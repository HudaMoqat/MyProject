# MyProject
Laravel Project Requirements
Task: Student-Teacher Management System with AdminLTE, 
Middleware, and Git (Excluding Authorization)
Project Description: Develop a Student-Teacher Management System 
using Laravel that enables teachers to manage students, assignments, 
and students to view and submit assignments. The project should 
incorporate the AdminLTE template for user interface styling, 
implement a middleware scenario for role-based access control, and use 
Git for version control.
Requirements:
1. Authentication:
o Set up authentication using Laravel’s built-in scaffolding.
2. Database Setup:
o Create an ER diagram that represents the database 
structure of your Student-Teacher Management System. 
(Provide me Image).
o Design the database schema to accommodate students, 
teachers, assignments.
o Establish appropriate relationships between tables.
3. Teacher Dashboard:
o Create a dashboard for teachers to view a list of students.
o Enable CRUD operations for student management.
o Allow teachers to create and assign assignments to 
students.
4. Student Dashboard:
o Develop a dashboard for students to view assignment 
details.
o Display a list of assignments with due dates and 
submission status.
o Implement assignment submission functionality.
5. Assignment Management:
o Enable file uploads for assignment submissions.
2
o Display assignment details, including title, due date, and 
attached files.
6. Styling and UI:
o Integrate the AdminLTE template for styling the user 
interface.
o Apply the template’s components, styles, and layout to the 
Laravel views.
o Ensure a responsive design that works well on different 
screen sizes.
7. Middleware Scenario: Role-Based Access Control:
o Create a middleware named RoleMiddleware using the 
command php artisan make:middleware RoleMiddleware.
o Define logic in the middleware to check the user’s role 
and restrict access if necessary.
o Apply the middleware to routes to enforce role-based 
access control.
o Test the middleware with users having different roles 
(teacher/student) to verify restricted access.
8. Git Version Control:
o Install Git on your local machine if not already done.
o Create a GitHub account if you don’t have one.
o Initialize a Git repository in your project folder.
o Commit your code changes and push them to your GitHub 
repository.
