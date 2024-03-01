# Parking Manager Application

This is a simple Parking Manager application built with PHP and MariaDB. It allows managing parking spaces, cameras, recognitions, and stays.

## Prerequisites

Before you begin, ensure you have the following installed:

- Docker: [Docker Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose: [Docker Compose Installation Guide](https://docs.docker.com/compose/install/)

## Installation

### 1. Clone the repository:

```bash
git clone https://github.com/StadtraumGmbH/php_challenge.git
```

### 2. Navigate to the project directory:

```bash
cd php_challenge
```

### 3. Build and run the Docker containers:

```bash
docker-compose build
docker-compose up -d
```

### 4. Access the application in your browser:

http://localhost:8080

## Your Tasks

### Task 1: Open Pull Request Review

We have an open pull request that adds the cameras.php file to our repository. Please review the changes made in this pull request and provide feedback. It might contain some errors, please test it and look for any potential improvements, code quality, and adherence to best practices.

Pull Request URL: [https://github.com/StadtraumGmbH/php_challenge/pull/1]

### Task 2: Create a New Branch and Add Stays Page

1. Create a new branch named 'add-stays-page' based on the main branch.
2. Refactor the existing code in cameras.php. Improve code structure and readability.
3. Create a new PHP page named stays.php.
4. Implement functionality to display all stays for a specific parking space on the stays.php page.
5. Ensure the page is styled appropriately and follows best practices for HTML and PHP coding.

### Submission Guidelines

- Provide feedback on the open merge request suggesting necessary changes.
- Create a new branch 'add-stays-page' and make the necessary changes.
- Commit your changes and push the branch to the repository.
- Open a new pull request for the 'add-stays-page' branch.
- Feel free to ask any questions or seek clarification on the tasks. Good luck!
