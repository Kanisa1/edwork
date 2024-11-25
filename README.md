# **EduWork Connect**

### **Project Overview**
EduWork Connect is a responsive web platform designed to bridge the gap between mentees and mentors while streamlining administrative processes for mentorship programs. The system offers user-friendly features for mentees, mentors, and admins to interact efficiently.

---

### **Features**
1. **User Roles**:
   - **Mentee**: Can create accounts, request mentorship, and view mentorship resources.
   - **Mentor**: Can manage mentees, view requests, and provide feedback.
   - **Admin**: Manages mentorship data, generates reports, and monitors platform activity.

2. **Core Functionalities**:
   - Secure user **login** and **registration**.
   - Interactive dashboard tailored for each user role.
   - Seamless navigation with responsive design across all devices.

---

### **Project Links**
- **Live Application**: https://www.eduwork.great-site.net/
- **Video Demo**: https://drive.google.com/file/d/18Ts9o3onMYS8KX0kcl6v1GwAkPqapXJM/view?usp=sharing
- **SRS Document**: https://docs.google.com/document/d/1_zq0T3XEFLXYgpMEtp_xqkUWqtVEO39jfoeh4nG0shQ/edit?usp=sharing

---

### **Setup Instructions**

#### **Prerequisites**
Before setting up the project, ensure you have the following installed:
- **Web Server**: Apache or any compatible server.
- **PHP**: Version 7.4 or higher.
- **MySQL**: Version 5.7 or higher.
- **Node.js**: Version 14 or higher (for dependencies and tools like npm/yarn).

#### **Installation Steps**
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/eduwork-connect.git
   cd eduwork-connect
   ```

2. **Setup Database**:
   - Import the database file located at `/db/eduwork_connect.sql` into your MySQL server.
   - Configure database credentials in the `/config/database.php` file:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'eduwork_connect');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     ```

3. **Install Dependencies**:
   - Install PHP dependencies using **Composer**:
     ```bash
     composer install
     ```
   - Install frontend dependencies using **npm** or **yarn**:
     ```bash
     npm install
     ```

4. **Run the Application**:
   - Start your local server or deploy to a hosting service.
   - Access the application in your browser via `http://localhost/eduwork-connect`.

---

### **Usage Instructions**
1. **Admin**:
   - Log in using admin credentials (`admin@example.com` / `password`).
   - Manage users, mentorship requests, and generate reports.

2. **Mentee**:
   - Register and log in.
   - Submit mentorship requests and access available resources.

3. **Mentor**:
   - Respond to mentorship requests and update progress reports.

---

### **Technologies Used**
- **Frontend**:
  - HTML, CSS, JavaScript, Bootstrap
- **Backend**:
  - PHP, MySQL
- **Tools**:
  - GitHub for version control
  - Figma for design mockups
  - Postman for API testing

---

### **Known Issues**
- None reported at the time of deployment.

---

### **Future Enhancements**
1. Add real-time chat functionality between mentees and mentors.
2. Introduce a recommendation system for mentor-mentee pairing.
3. Provide advanced analytics for admin reports.

---

### **Contributors**
- **Kanisa Rebecca Majok Thiak**  
  *Lead Developer*  
  [GitHub Profile](#replace-with-your-github-profile-link)

---

### **License**
This project is licensed under the MIT License. See the `LICENSE` file for details.

---
