-- 1) Create the roles table
CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(20) NOT NULL UNIQUE
);

-- 2) Create the users table and link it to roles
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255),
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    CONSTRAINT fk_user_role
        FOREIGN KEY (role_id)
        REFERENCES roles (role_id)
        ON DELETE CASCADE
);

-- 3) Create the categories table
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    category_description TEXT
);

-- 4) Create the courses table
--    Each course belongs to a category and is taught by one teacher.
CREATE TABLE courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_description TEXT,
    content TEXT, -- Added field for course content
    participants INT DEFAULT 0, -- Added field to track number of participants
    category_id INT,
    teacher_id INT,
    start_date DATE, -- New property to store the course start date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically set the date when the course is created
    active BOOLEAN DEFAULT 1, -- New property to indicate if the course is active (1 = active, 0 = inactive)
    deleted_at TIMESTAMP NULL, -- Property to store the date if the course is soft-deleted
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- New property to store the creation date
    CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES categories (category_id)
        ON DELETE SET NULL,
    CONSTRAINT fk_teacher
        FOREIGN KEY (teacher_id)
        REFERENCES users (user_id)
        ON DELETE SET NULL
);


-- 5) Create the enrollments table
--    This manages the many-to-many relationship between students and courses.
CREATE TABLE enrollments (
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    PRIMARY KEY (student_id, course_id),
    CONSTRAINT fk_enrollment_student
        FOREIGN KEY (student_id)
        REFERENCES users (user_id)
        ON DELETE CASCADE,
    CONSTRAINT fk_enrollment_course
        FOREIGN KEY (course_id)
        REFERENCES courses (course_id)
        ON DELETE CASCADE
);

-- 6) Create the exercises table
CREATE TABLE exercises (
    exercise_id INT AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    exercise_content TEXT
);

-- 7) Create the course_tags table
--    This handles the many-to-many relationship between courses and tags.
CREATE TABLE course_tags (
    course_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (course_id, tag_id),
    CONSTRAINT fk_course_tags_course
        FOREIGN KEY (course_id)
        REFERENCES courses (course_id)
        ON DELETE CASCADE,
    CONSTRAINT fk_course_tags_tag
        FOREIGN KEY (tag_id)
        REFERENCES tags (tag_id)
        ON DELETE CASCADE
);

-- 8) Create the exercise_course table
--    This manages the many-to-many relationship between exercises and courses.
CREATE TABLE exercise_course (
    exercise_id INT NOT NULL,
    course_id INT NOT NULL,
    PRIMARY KEY (exercise_id, course_id),
    CONSTRAINT fk_exercise_course_exercise
        FOREIGN KEY (exercise_id)
        REFERENCES exercises (exercise_id)
        ON DELETE CASCADE,
    CONSTRAINT fk_exercise_course_course
        FOREIGN KEY (course_id)
        REFERENCES courses (course_id)
        ON DELETE CASCADE
);
