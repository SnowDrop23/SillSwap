# SkillSwap – Skill Exchange Platform

# >> Overview
SkillSwap is a dynamic web platform that facilitates peer-to-peer learning by allowing users to exchange skills. Instead of monetary transactions, users trade their expertise, creating a community-driven ecosystem for personal and professional growth.

# >> Group Details
* Group Number: 01
* Course Name: Database Management Systems (DBMS)
* Instructor: Md. Fahmidur Rahman Sakib


# >> Team Members

| Name | ID | Contribution | Core Responsibility |
| :--- | :--- | :---: | :--- |
| **Taniya Rashid Habiba** | 241-115-058 | 25% | Frontend Development (UI/UX) |
| **Dipannita Bardhan** | 241-115-063 | 25% | Backend Development (Logic and Auth) |
| **Adiba Jannat** | 241-115-097 | 25% | Database Management (SQL & Schema) |
| **Tomalika Toma** | 241-115-066 | 25% | Admin Dashboard & Search filter |

# >> Objective
In traditional learning, costs can be a barrier. SkillSwap solves this by treating "skills" as currency. It aims to bridge the gap between mentors and learners within a university or local community, providing an organized digital space to request, manage, and track skill-sharing sessions.

# >> Features
* ✅ Card-Based Discovery: A clean, visually appealing UI to browse available skills.
* ✅ User Authentication: Secure registration and login for students and mentors.
* ✅ Skill Management: Users can post their own skills and manage their listings.
* ✅ Request System: A dedicated system to send and track skill exchange requests between users.
* ✅ Search Functionality: Real-time search to find specific expertise instantly.
* ✅ Admin Control Panel: Specialized dashboard to manage users and moderate posts for platform safety.

# >> Project Preview
# UI Screenshots

Login Page
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/a2f34fab00923b6c6f46dd5936035c253e90d88a/login.png)

Registration Page
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/register.png)

User Dashboard
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/loged%20in%20as%20user.png)
Post a new skill
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/post%20a%20new%20skill.png)
My request
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/my%20request.png)
Admin: Dashboard
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/admin_dashboard.png)
Admin: Manage Users
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/manage_users.png)
Admin: Manage Posts
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/manage_posts.png)
Admin: View User Dashboard
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/2bef387ec524969ded74509e30dd2bb07ede634f/adminViewUser.png)

Database
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/16321f9504ca33b79819ed0994272bb494acb771/database.png)

ER Diagram
![image alt](https://github.com/SnowDrop23/SkillSwap/blob/4ecf7c3fa2437554146fcd0548970be28d167066/er%20diagram.jpeg)

# Demo Video
[Watch Project Demo on Google Drive](https://drive.google.com/file/d/1oep-_wSXuKouBF_bWCxV0cRYm0W9YAui/view?usp=drive_link)


# >> Tech Stack
# Frontend:
Developed using HTML5 and CSS3 with a custom card-based design. The focus was on creating a responsive and intuitive user interface that makes browsing skills as easy as scrolling through a social feed.

# Backend:
Built with PHP, handling session management, user authentication, and the logic for the skill request system. It follows a modular structure where administrative tasks are isolated in a secure directory.

# Database:
Powered by MySQL. The database is designed with normalized tables including users, skills, and requests. It utilizes relational mapping to connect "Senders" and "Receivers" in the exchange process.



# >> Installation & Setup
```
1. Clone the repository
git clone https://github.com/snowdrop23/SkillSwap.git

2. Move to your local server directory
(C:/xampp/htdocs/SkillSwap)

3. Database Setup
Import the provided .sql file into your local phpMyAdmin
Create a database named: skill_exchange_db

4. Configure Database
Edit db_config.php with your local MySQL credentials

5. Run the Project
Open your browser and go to: http://localhost/SKILL_EXCHANGE_PLATFORM/
```

## >> Project Structure

```text
SKILL_EXCHANGE_PLATFORM
├── admin/
│   ├── admin_header.php
│   ├── auth_check.php
│   ├── dashboard.php
│   ├── logout.php
│   ├── manage_posts.php
│   └── manage_users.php
├── db_config.php
├── index.php
├── login.php
├── register.php
├── dashboard.php
├── post_skill.php
├── requests.php
├── search.php
├── style.css
└── README.md
# >>Demo Video
