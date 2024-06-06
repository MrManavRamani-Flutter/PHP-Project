# Resume Builder

## Overview
Resume Builder is a dynamic web application that allows users to create, manage, and download resumes. It includes user authentication, customizable resume templates, and an admin panel for managing users and resumes.

## Features
- User registration and login
- Create and edit resumes
- Choose from predefined themes
- Download resumes as PDF
- Admin panel to manage users and resumes

## Installation
1. Clone the repository
    ```bash
    git clone git remote add origin https://github.com/MrManavRamani-Flutter/PHP-Project.git
    ```
2. Navigate to the project directory
    ```bash
    cd resume-builder
    ```
3. Configure the database in `includes/db.php`
4. Import the SQL tables from the `database.sql` file

## Usage
1. Start your web server and navigate to the project directory
2. Access the application in your browser
3. Register as a new user and create your resume

## Database Structure  - `resume_builder`: database name
- `users`: Stores user information
- `resumes`: Stores resume metadata
- `resume_sections`: Stores individual sections of a resume
- `resume_templates`: Stores predefined resume templates
- `resume_drafts`: Stores user-specific resume drafts

## Contributing
1. Fork the repository
2. Create a new branch (`git checkout -b feature-branch`)
3. Make your changes
4. Commit your changes (`git commit -m 'Add new feature'`)
5. Push to the branch (`git push origin feature-branch`)
6. Create a new Pull Request

## Project Structer

```
resume-builder/
│
├── admin/
│   ├── index.php
│   ├── manage_resumes.php
│   └── manage_users.php
│
├── assets/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── scripts.js
│   ├── bootstrap/
│       └── ... (Bootstrap files)
│
├── includes/
│   ├── db.php
│   ├── header.php
│   ├── footer.php
│   ├── auth.php
│   └── functions.php
│
├── users/
│   ├── register.php
│   ├── login.php
│   ├── logout.php
│   ├── dashboard.php
│   └── build_resume.php
│
├── index.php
├── download.php
├── save_resume.php
└── documentation/
    └── README.md

```
