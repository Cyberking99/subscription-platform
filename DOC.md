# Documentation for the Subscription Platform

This documentation provides an overview of the Subscription Platform, a simple RESTful API-based subscription platform that allows users to subscribe to one or multiple websites. Whenever a new post is published on a particular website, all its subscribers receive an email notification with the post title and description.

## 1. Endpoints and their Uses

### 1.1 Website Endpoints

#### 1.1.1 Create a Website
- Method: POST
- URL: `/api/websites`
- Description: Create a new website in the platform.
- Request Body: JSON object with the following attributes:
  - `name`: (required) The name of the website.
- Response:
  - Status: 201 Created
  - JSON object containing the created website details.

### 1.2 Subscription Endpoints

#### 1.2.1 Subscribe to a Website
- Method: POST
- URL: `/api/websites/{website}/subscribe`
- Description: Subscribe to a specific website to receive email notifications for new posts.
- URL Parameters:
  - `website`: The ID of the website to subscribe to.
- Request Body: JSON object with the following attributes:
  - `email`: (required) The email address of the subscriber.
- Response:
  - Status: 201 Created
  - JSON object containing the subscriber details.

### 1.3 Post Endpoints

#### 1.3.1 Create a Post for a Website
- Method: POST
- URL: `/api/websites/{website}/posts`
- Description: Create a new post for a particular website.
- URL Parameters:
  - `website`: The ID of the website for which the post will be created.
- Request Body: JSON object with the following attributes:
  - `title`: (required) The title of the post.
  - `description`: (required) The description of the post.
- Response:
  - Status: 201 Created
  - JSON object containing the created post details.

## 2. How to Start All Services

To start all services for the Subscription Platform, follow these steps:

1. Clone the Repository:
   - Clone the repository to your local development environment.

2. Install Dependencies:
   - Navigate to the root folder of the project and run `composer install` to install PHP dependencies.

3. Set Up Database:
   - Create a new MySQL database and configure the database connection in the `.env` file with the appropriate database credentials.

4. Run Migrations:
   - Run the following commands to create the required database tables:
     ```bash
     php artisan migrate
     ```

5. Start the Laravel Development Server:
   - Run the following command to start the Laravel development server:
     ```bash
     php artisan serve
     ```

6. Start the Queue Worker:
   - Open a new terminal window and run the following command to start the queue worker for background jobs and email processing:
     ```bash
     php artisan queue:work
     ```

7. Access the API:
   - Once the development server is running, you can access the API at `http://localhost:8000/api` or `http://127.0.0.1:8000/api`.

## 3. How to Set Up Email

To set up email functionality for the Subscription Platform, follow these steps:

1. Configure `.env` File:
   - Open the `.env` file and update the following mail configuration variables:
     ```
     MAIL_MAILER=smtp
     MAIL_HOST=your_smtp_host
     MAIL_PORT=your_smtp_port
     MAIL_USERNAME=your_smtp_username
     MAIL_PASSWORD=your_smtp_password
     MAIL_ENCRYPTION=tls
     ```

2. Mailtrap for Local Development:
   - For local development and testing, I used Mailtrap (https://mailtrap.io/) to capture sent emails.

With the above steps completed, the Subscription Platform should be set up to send email notifications to subscribers whenever a new post is published on a website.

## 4. Postman Collection

Link to the postman collection documentation is: [https://documenter.getpostman.com/view/17144184/2s9XxvSuDL](https://documenter.getpostman.com/view/17144184/2s9XxvSuDL)

The links of the endpoints are prepended with a variable `{{API_BASE_URL}}` which is `http://127.0.0.1:8000/api`