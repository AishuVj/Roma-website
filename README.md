# Essential English Skills: Steps to ESOL

A web-based English learning platform created for Roma Support Group and ELATT, featuring PHP, MySQL, and custom resource management for adult ESOL learners in the UK.

## Live Demo

https://roma.infinityfree.me/

## Overview

This project delivers a structured online English course for speakers of other languages, focusing on daily UK life and practical English skills. Split into Entry 1 (beginner) and Entry 3 (intermediate), it covers health, benefits, and everyday topics through video lessons, practice activities, and quizzes.

Key highlights:
- 8 interactive units per level, each with multimedia content and assessments
- Simple session management and PHP-driven quiz tracking
- Auto-generated certificates for learners passing the final test (75%+)

## Features

- **User Experience:**  
  - Simple, self-paced navigation through English units  
  - Video lessons, practice activities, and quizzes per unit  
  - Downloadable achievement certificate on course completion  

- **Technical:**  
  - Built with PHP for the backend and logic  
  - CSV and image assets for quizzes and progress tracking  
  - Data persistence via CSV or database connection (`assessmentroma.csv`, `Ketanol.csv`)

## Tech Stack

- PHP
- MySQL (or CSV-based data tracking)
- HTML, CSS, JS (frontend, vanilla)
- Hosted on cPanel/shared hosting (standard LAMP stack)

## Folder Structure

- `*.php` — Main application files (units, quiz, assessment, certificate generation, etc.)
- `.csv` files — Store learner progress and quiz data
- `/images` — All visual resources for progress and learning
- `/videos` —  for video lessons

## Run Locally

1. Clone the repo or download the files.
2. Copy all files to your local or remote PHP web server (XAMPP, MAMP, or cPanel hosting).
3. If using MySQL, export and import any provided `.sql` database file before running.
4. Visit the start page (e.g., `index.php`, `landing.php`) via localhost or your server’s URL to begin.

## About

This project was designed with charities and real-world learners in mind, providing accessible English learning and digital certificate achievement in the UK context.




