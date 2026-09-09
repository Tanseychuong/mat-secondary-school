# Mat Secondary School Website

## 1. Project Overview

The Mat Secondary School Website is a simple dynamic web application developed for Mat Secondary School. The application provides visitors with information about the school, its academic programmes, news and events, and a means of contacting the school.

The project is designed as a practical demonstration of fundamental web development technologies, including:

* HTML
* CSS
* JavaScript
* jQuery
* PHP
* MySQL

The application will be deployed online using a free web hosting service that supports PHP and MySQL.

The system is intentionally kept relatively simple so that each technology has a clear and demonstrable purpose.

---

# 2. Project Objectives

The main objectives of the project are to:

1. Develop a functional school website using standard web technologies.
2. Create a responsive and user-friendly interface.
3. Use HTML to structure the website content.
4. Use CSS to control the appearance, layout, and responsiveness of the website.
5. Use JavaScript to provide client-side interactivity.
6. Use jQuery for simplified DOM manipulation and interactive behaviour.
7. Use PHP for server-side processing.
8. Use MySQL to persist application data.
9. Deploy the completed application to a publicly accessible web server.
10. Demonstrate an understanding of how frontend and backend technologies work together.

---

# 3. Target Users

The primary users of the website are:

### Prospective Students

Students who want to learn about Mat Secondary School, its academic programmes, and school activities.

### Parents and Guardians

Parents and guardians who want general information about the school and a way to submit enquiries.

### Current Students

Students who may use the website to access school news and events.

### General Visitors

Members of the public who want to learn about the school.

### School Administration

Administrators can view enquiries submitted through the website.

---

# 4. Proposed Website Features

## 4.1 Home Page

The home page will provide an introduction to Mat Secondary School.

It will contain:

* School name
* Welcome message
* Short description of the school
* Navigation menu
* Featured information
* School highlights
* Recent news/events
* Call-to-action section
* Footer

The home page will serve as the main entry point to the application.

---

## 4.2 About Page

The About page will provide information about Mat Secondary School.

Planned sections include:

* School history
* Mission
* Vision
* Values
* Principal/headteacher message
* General school information

---

## 4.3 Academics Page

The Academics page will provide information about the school's academic programmes.

It may contain:

* Academic departments
* Subjects/programmes
* Learning information
* Academic activities
* General academic expectations

The page will primarily demonstrate structured HTML content and CSS presentation.

---

## 4.4 News and Events Page

The News and Events page will display school announcements and events.

Unlike purely static pages, news will be retrieved from the MySQL database through PHP.

The intended process is:

```text
MySQL Database
       ↓
     PHP
       ↓
   HTML Page
       ↓
    Browser
```

This provides a practical demonstration of PHP communicating with a database.

---

## 4.5 Contact Page

The Contact page will provide visitors with an enquiry form.

The form will contain:

* Name
* Email address
* Subject
* Message
* Submit button

When the visitor submits the form:

```text
Visitor
   ↓
HTML Form
   ↓
JavaScript/jQuery validation
   ↓
PHP processing
   ↓
MySQL database
   ↓
Success/error response
```

The submitted information will be stored in the database.

---

## 4.6 Administrative Page

A simple administrative page will be included to demonstrate retrieval of database information.

The page will display submitted enquiries from the MySQL database.

This is not intended to be a complete school management system. It exists primarily to demonstrate the application's backend functionality.

---

# 5. Technology Stack

## HTML

HTML will provide the structural foundation of the website.

Examples include:

* Navigation
* Headings
* Paragraphs
* Sections
* Forms
* Buttons
* Tables/cards
* Links

HTML will define what content exists on each page.

---

## CSS

CSS will control the visual presentation of the website.

It will be used for:

* Page layout
* Typography
* Colours
* Navigation
* Buttons
* Cards
* Forms
* Spacing
* Responsive design
* Mobile layouts
* Hover effects

The design will use a consistent visual identity for Mat Secondary School.

---

## JavaScript

JavaScript will provide client-side functionality.

Planned uses include:

* Mobile navigation
* Form interaction
* User feedback
* Basic client-side validation
* Dynamic interface behaviour

JavaScript will run in the user's browser.

---

## jQuery

jQuery will be used alongside standard JavaScript.

It will demonstrate:

* DOM manipulation
* Event handling
* Form validation
* Animations
* Showing and hiding elements
* Interactive feedback

For example, the contact form can use jQuery to check whether required fields have been completed before the form is submitted.

---

## PHP

PHP will provide the server-side functionality.

PHP will be responsible for:

* Connecting to MySQL
* Processing contact form submissions
* Validating submitted data on the server
* Inserting records into the database
* Retrieving news and events
* Retrieving enquiries
* Generating dynamic HTML content

PHP is particularly important because the application needs server-side processing before it can meaningfully demonstrate MySQL integration.

---

## MySQL

MySQL will provide persistent data storage.

The initial database will contain two main tables:

### `news`

Stores school news and events.

Proposed fields:

| Field      | Type      | Purpose                        |
| ---------- | --------- | ------------------------------ |
| id         | INT       | Unique record identifier       |
| title      | VARCHAR   | News/event title               |
| content    | TEXT      | News/event content             |
| event_date | DATE      | Date associated with the event |
| created_at | TIMESTAMP | Record creation time           |

### `enquiries`

Stores messages submitted through the contact form.

| Field      | Type      | Purpose                  |
| ---------- | --------- | ------------------------ |
| id         | INT       | Unique record identifier |
| name       | VARCHAR   | Visitor's name           |
| email      | VARCHAR   | Visitor's email          |
| subject    | VARCHAR   | Enquiry subject          |
| message    | TEXT      | Visitor's message        |
| created_at | TIMESTAMP | Submission time          |

---

# 6. System Architecture

The application follows a basic client-server architecture.

```text
                    MAT SECONDARY SCHOOL
                           WEBSITE
                              |
             +----------------+----------------+
             |                                 |
          Frontend                           Backend
             |                                 |
      HTML / CSS / JS                       PHP
             |                                 |
          jQuery                              |
             |                                 |
             +---------------+----------------+
                             |
                           MySQL
                             |
                    Persistent Data
```

The browser handles the frontend while the web server executes PHP and communicates with MySQL.

---

# 7. Request and Response Flow

For a normal page:

```text
User requests page
        ↓
Web server receives request
        ↓
PHP executes
        ↓
PHP generates HTML
        ↓
HTML/CSS/JavaScript sent to browser
        ↓
Browser renders website
```

For a contact form:

```text
User enters information
        ↓
JavaScript/jQuery performs client-side checks
        ↓
Form submitted
        ↓
PHP receives POST request
        ↓
PHP validates the information
        ↓
PHP connects to MySQL
        ↓
Information inserted into enquiries table
        ↓
PHP returns response
        ↓
User receives confirmation
```

---

# 8. Project File Architecture

The proposed project structure is:

```text
mat-secondary-school/
│
├── index.php
├── about.php
├── academics.php
├── news.php
├── contact.php
├── README.md
├── PROJECT_DOCUMENTATION.md
│
├── admin/
│   └── index.php
│
├── config/
│   └── database.php
│
├── includes/
│   ├── header.php
│   └── footer.php
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── database/
│   └── mat_school.sql
│
└── images/
    └── .gitkeep
```

---

# 9. Purpose of Each File

## `index.php`

The main landing page of the website.

It will contain the school's introduction and links to the major sections of the website.

---

## `about.php`

Contains information about Mat Secondary School.

---

## `academics.php`

Contains information about academic programmes and departments.

---

## `news.php`

Retrieves and displays news/events from MySQL using PHP.

---

## `contact.php`

Contains the enquiry form and PHP processing logic for submitted enquiries.

---

## `config/database.php`

Contains the PHP database connection configuration.

The database connection will be centralized in this file so that other PHP files can reuse it.

---

## `includes/header.php`

Contains reusable website elements such as:

* HTML document opening
* Navigation
* School name
* Links to CSS
* jQuery/JavaScript references

---

## `includes/footer.php`

Contains reusable elements such as:

* Footer
* Closing HTML elements
* JavaScript references

---

## `css/style.css`

Contains the main website styling.

---

## `js/script.js`

Contains JavaScript and jQuery functionality.

---

## `database/mat_school.sql`

Contains the SQL statements required to create the database tables and insert initial sample data.

---

## `admin/index.php`

Provides a simple interface for retrieving and displaying submitted enquiries.

---

## `images/`

Reserved for school photographs and other visual assets.

The initial version will use placeholders because school images and a logo are not currently available.

---

# 10. Database Design

The database will initially be called:

```text
mat_secondary_school
```

The relationship between the main tables is intentionally simple.

```text
+----------------------+
|        news          |
+----------------------+
| id                   |
| title                |
| content              |
| event_date           |
| created_at           |
+----------------------+


+----------------------+
|     enquiries        |
+----------------------+
| id                   |
| name                 |
| email                |
| subject              |
| message              |
| created_at           |
+----------------------+
```

There is no direct relationship between these tables because news and enquiries represent independent types of information.

---

# 11. Form Validation

Validation will occur at two levels.

### Client-side validation

JavaScript/jQuery will provide immediate feedback to the user.

For example:

* Name cannot be empty.
* Email cannot be empty.
* Email should have a valid format.
* Message cannot be empty.

### Server-side validation

PHP will perform validation again after receiving the request.

This is necessary because client-side validation alone should not be trusted.

The PHP backend will:

1. Receive the submitted data.
2. Validate required fields.
3. Validate the email address.
4. Sanitize/process the input appropriately.
5. Insert valid information into MySQL.
6. Return an appropriate response.

---

# 12. Security Considerations

Although this is a small academic project, basic security practices will be used.

These include:

* Server-side validation
* Input validation
* Prepared SQL statements
* Appropriate output escaping
* Avoiding direct insertion of untrusted user input into SQL queries

The database credentials will be kept in the database configuration rather than repeatedly written throughout the application.

The administrative page is intended as a demonstration feature and may receive additional access control if time permits.

---

# 13. Responsive Design

The website will be designed to work on:

* Desktop computers
* Laptops
* Tablets
* Mobile phones

CSS media queries will be used to adapt the layout to smaller screens.

The navigation menu will also provide a mobile-friendly interaction using JavaScript/jQuery.

---

# 14. Image and Gallery Section

The website will reserve space for school images.

At the initial development stage, actual school photographs and a logo are not available.

Therefore, the image section will use a placeholder rather than delaying development.

The images can later be replaced without changing the application's core architecture.

---

# 15. Deployment

The completed application will be deployed using a free PHP/MySQL hosting service.

A suitable option is InfinityFree or another free provider supporting:

* PHP
* MySQL
* File uploads
* Public web hosting

The deployment process will generally involve:

1. Create a free hosting account.
2. Create the website/hosting space.
3. Create a MySQL database.
4. Record the database credentials.
5. Update the PHP database configuration.
6. Upload the website files.
7. Import the SQL database.
8. Configure the database connection.
9. Open the public website.
10. Test all pages and database functionality.

The exact hosting provider and deployment configuration will be documented after the provider is selected.

---

# 16. Testing Plan

The application will be tested before submission.

### Navigation Testing

Verify that:

* Home works.
* About works.
* Academics works.
* News works.
* Contact works.
* Navigation links work correctly.

### Form Testing

Test:

* Empty form submission.
* Invalid email.
* Missing name.
* Missing message.
* Valid submission.

### Database Testing

Verify that:

* News can be retrieved from MySQL.
* Contact enquiries are inserted into MySQL.
* Enquiries can be retrieved by the administrative page.

### Responsive Testing

Test the website at different screen sizes.

### Deployment Testing

After deployment:

* Open the public URL.
* Test every page.
* Submit a test enquiry.
* Confirm that the enquiry reaches MySQL.
* Confirm that dynamic news displays correctly.

---

# 17. Requirements Demonstration

The application is designed so that every technology required by the laboratory can be demonstrated clearly.

| Requirement | Implementation                                    |
| ----------- | -------------------------------------------------- |
| HTML        | Page structure, forms, navigation, content        |
| CSS         | Layout, colours, typography, responsiveness       |
| JavaScript  | Client-side interaction and validation            |
| jQuery      | DOM manipulation, events, form feedback           |
| PHP         | Server-side processing and database communication |
| MySQL       | Storage and retrieval of news and enquiries       |
| Deployment  | Publicly hosted PHP/MySQL application             |

---

# 18. Demonstration Video 1

The first video must be less than five minutes and demonstrate the completed application.

A possible demonstration sequence is:

### 1. Introduce the website

Explain that the application is a school website developed for Mat Secondary School.

### 2. Demonstrate the frontend

Show:

* Home page
* About page
* Academics page
* News/events
* Contact page

Explain briefly how HTML and CSS are being used.

### 3. Demonstrate JavaScript and jQuery

Show an interactive feature such as:

* Mobile navigation
* Form validation
* Dynamic feedback
* Animation

Then briefly show the relevant JavaScript/jQuery code.

### 4. Demonstrate PHP

Open the PHP files and explain:

* How PHP generates dynamic content.
* How PHP processes the contact form.
* How PHP communicates with MySQL.

### 5. Demonstrate MySQL

Show the database and explain:

* The `news` table.
* The `enquiries` table.
* How submitted information is stored.

### 6. Demonstrate the complete process

Submit an enquiry and show that the information appears in the database/admin interface.

This creates a direct demonstration that the frontend, PHP, and MySQL components are connected.

---

# 19. Demonstration Video 2

The second video must also be less than five minutes.

It will demonstrate the deployment process.

The video should show:

1. The local project.
2. The hosting provider.
3. Creation/configuration of the hosting account.
4. Creation of the MySQL database.
5. Uploading the website files.
6. Importing the SQL database.
7. Updating the database configuration.
8. Opening the deployed website.
9. Testing the deployed application.

The recording should be performed by the student and should explain the actual steps taken.

---

# 20. Deliverables

The final submission will contain three components.

### Deliverable 1 — Application Demonstration Video

A video of less than five minutes demonstrating the application and explaining the use of:

* HTML
* CSS
* JavaScript
* jQuery
* PHP
* MySQL

### Deliverable 2 — Deployment Video

A video of less than five minutes demonstrating the deployment process.

### Deliverable 3 — Source Code

A ZIP archive containing all project files.

The final ZIP should contain the complete application, including:

```text
mat-secondary-school/
```

with all PHP, CSS, JavaScript, SQL, configuration, and supporting files.

---

# 21. Development Constraints

The project is intentionally scoped as a simple web application.

The following features are outside the initial scope:

* Full student management system
* Student grading system
* Online examination system
* School payment system
* Complex authentication
* Advanced content management system
* Mobile application

These features could be added in a larger production system but are unnecessary for demonstrating the requirements of this laboratory.

---

# 22. Future Improvements

Possible future improvements include:

* School logo and official photographs
* Secure administrator authentication
* Full news management system
* Student portal
* Teacher portal
* Online admission application
* Event calendar
* Image gallery
* School announcements
* Search functionality
* Online results portal
* Email notifications
* Improved database relationships
* Role-based access control

These improvements are deliberately excluded from the first version so that the required laboratory functionality can be completed and tested within the available development time.

---

# 23. Project Success Criteria

The project will be considered successful when:

1. The website loads correctly.
2. All major pages are accessible.
3. The website has a consistent responsive design.
4. JavaScript functionality works.
5. jQuery functionality works.
6. PHP successfully processes server-side requests.
7. PHP successfully communicates with MySQL.
8. Contact enquiries are stored in MySQL.
9. News/events can be retrieved from MySQL.
10. The application is publicly accessible after deployment.
11. The complete source code can be downloaded as a ZIP file.
12. The two required demonstration videos can be recorded within the required time limits.

---

# 24. Development Sequence

Implementation will follow this order:

```text
1. Create project architecture
          ↓
2. Configure MySQL database
          ↓
3. Create reusable PHP components
          ↓
4. Build HTML/PHP pages
          ↓
5. Implement CSS design
          ↓
6. Add JavaScript
          ↓
7. Add jQuery functionality
          ↓
8. Implement PHP form processing
          ↓
9. Connect PHP to MySQL
          ↓
10. Implement dynamic news
          ↓
11. Implement enquiry retrieval
          ↓
12. Test locally
          ↓
13. Deploy
          ↓
14. Test deployed application
          ↓
15. Record demonstration videos
          ↓
16. Create final ZIP
```

---

# 25. Final Project Description

Mat Secondary School Website is a small dynamic web application that combines frontend and backend web technologies into a single working system. Visitors can navigate school information, view dynamically retrieved news and events, and submit enquiries through a web form. PHP processes the submitted information while MySQL provides persistent storage.

The project demonstrates the relationship between browser-based technologies and server-side technologies rather than treating HTML, CSS, JavaScript, PHP, and MySQL as isolated components. Its design also leaves room for the later addition of authentic school photographs, branding, and expanded functionality.
