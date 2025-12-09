# blog-php-react
Blog website using PHP , React Js

## 1 - Setup Database 101
- Created MySQL database for the project.
- Used prepared statements for secure queries.
- Implemented Singleton Design Pattern for the database connection.
- Followed Separation of Concerns to organize code (Models, Views, Controllers (next)).
- Applied DRY principle using a BaseModel to avoid repeating CRUD code.
- Planned integration of ORM (Doctrine or custom) as next step.

## 2 - Implement Routing System (Altorouter)
- Integrated AltoRouter for clean, maintainable routing.
- Created a routing file (index.php) to handle all requests.
- Added .htaccess for pretty URLs in Apache / Laragon environment.
- Implemented basic routes:
    - Frontend routes: for rendering pages like /blog/list or /blog/create.
    - API routes: follow REST conventions (GET, POST, PUT, DELETE) for /api/blogs.
    - Supports method override via a hidden _method field in forms for PUT/DELETE requests.
    - Routes not matched will return a 404 Not Found.