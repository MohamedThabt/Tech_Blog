# Tech_Blog: A Laravel-based Blogging Platform

## Project Overview

Tech_Blog is a feature-rich blogging platform built with Laravel, designed as part of a backend learning journey. This project implements various Laravel concepts and features, providing a robust system for managing blog posts and users.

## Features

1. **User and Post Management**
   - Two main entities: Users and Posts (Many-to-One relationship)
   - CRUD operations for both Users and Posts
   - Each post can have an image, with a default image for posts without one
   - Deleting a user also deletes their posts

2. **Search Functionality**
   - Search posts by title

3. **Post Ordering**
   - Posts are ordered by most recently added

4. **User Authentication and Authorization**
   - Registration system with validation
   - Login system
   - Two user roles: Admin and Writer
   - Role-based permissions using Gates and Policies

5. **Post Management**
   - Writers can create, edit, and delete their own posts
   - Admins can manage all posts and users

6. **Validation**
   - User registration validation
   - Post validation (title, description, user, image file)

## Technologies Used

- Backend: Laravel (PHP framework)
- Frontend: HTML, CSS, Bootstrap
- Database: MySQL
- Additional: JavaScript for enhanced interactivity

## Installation and Setup

Follow these steps to set up the project locally:

1. **Clone the repository**
   ```
   git clone https://github.com/your-username/tech-blog.git
   cd tech-blog
   ```

2. **Install PHP dependencies**
   ```
   composer install
   ```

3. **Install JavaScript dependencies**
   ```
   npm install
   ```

4. **Create a copy of the .env file**
   ```
   cp .env.example .env
   ```

5. **Generate an app encryption key**
   ```
   php artisan key:generate
   ```

6. **Create a new database for the application**

7. **Update the .env file with your database credentials**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

8. **Run database migrations**
   ```
   php artisan migrate
   ```

9. **Seed the database (if seeders are available)**
   ```
   php artisan db:seed
   ```

10. **Create a symbolic link for file uploads**
    ```
    php artisan storage:link
    ```

11. **Compile assets**
    ```
    npm run dev
    ```

12. **Start the local development server**
    ```
    php artisan serve
    ```

You can now access the application at `http://localhost:8000`

## Usage

1. **Registration and Login**
   - Navigate to the registration page to create a new account
   - Use your credentials to log in

2. **Creating Posts**
   - Writers can create new posts from their dashboard
   - Fill in the title, description, and optionally upload an image

3. **Managing Posts**
   - Writers can edit or delete their own posts
   - Admins can manage all posts

4. **User Management (Admin only)**
   - Admins can create new users and modify user permissions

5. **Searching Posts**
   - Use the search functionality to find posts by title

## Demo

You can check out a live demo of the project here:
[Tech_Blog Demo](http://www.tech-blog.free.nf/?i=1)

(Note: You may need to use a VPN to access the demo link.)

## Contributing

Contributions to improve Tech_Blog are welcome. Please follow these steps:

1. Fork the repository
2. Create a new branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
