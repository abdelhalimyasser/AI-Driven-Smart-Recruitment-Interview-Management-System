# 🧠 NextHire — AI-Driven Smart Recruitment & Interview Management System

<img width="130" height="145" alt="capital-university" src="https://github.com/user-attachments/assets/9a940f0b-d3d3-454e-9413-dd7fd88d9f2e" align="right" />

**Faculty of Computing and Artificial Intelligence**
**Capital University** *~(Formerly Helwan University)*

**Course:** Software Engineering 1 (CS-251)  
**Instructor:** Prof. Amr S. Ghoniem  
**Academic Year:** 2025/2026

---

## 📋 Project Overview

NextHire is an enterprise-grade recruitment platform designed to streamline the full hiring lifecycle — from job posting and candidate application through AI-assisted screening, interview scheduling, and final decision-making. The system supports **multiple user roles** with tailored dashboards and enforces clean separation of concerns through a hand-crafted MVC architecture in PHP.

---



## 🛠️ Technologies & Architecture

| Layer              | Technology / Pattern                          |
|--------------------|-----------------------------------------------|
| Backend            | PHP 8.x — hand-crafted MVC                    |
| Architecture       | Abstracts · Contracts (Interfaces) · Services |
| Data Layer         | MySQL via custom Model classes                |
| Frontend           | PHP Views + HTML/Tailwind CSS/JS              |
| Design Patterns    | Repository, Strategy, Singleton, Factory      |
| Version Control    | Git + GitHub (branching strategy enforced)    |
| Documentation      | UML (9 diagram types) + PDF requirements      |

---

## 📐 Architecture & UML Diagrams

All diagrams are documented under [`docs/architecture/`](docs/architecture/) and cover the full system design across both project phases.

| Diagram Type                         | Description                                              | Link                                                                     |
|--------------------------------------|----------------------------------------------------------|--------------------------------------------------------------------------|
| ⚡ **Activity Diagram**             | Business process flows (apply, screen, schedule, hire)   | [View](docs/architecture/Activity%20Diagram/README.md)                    |
| 🧬 **Class Diagram**                | Full OOP class hierarchy (abstracts, models, services)   | [View](docs/architecture/Class%20Diagram/README.md)                       |
| 🤝 **Collaboration Diagram**        | Object interaction and messaging structure               | [View](docs/architecture/Collaboration-Communication%20Diagram/README.md) |
| 🗃️ **ERD**                          | Full entity-relationship schema for the database layer   | [View](docs/architecture/ERD/README.md)                                   |
| 🧩 **Object Diagram**               | Runtime object snapshots for core use cases              | [View](docs/architecture/Object%20Diagram/README.md)                      |
| 📦 **Package Diagram**              | Module boundaries and dependency graph                   | [View](docs/architecture/Package%20Diagram/README.md)                     |
| 🏗️ **System Architecture Diagram**  | High-level overview of MVC layers and component flow     | [View](docs/architecture/System%20Architecture%20Diagram/README.md)       |
| 🔁 **Sequence Diagram**             | Request/response flows for key system operations         | [View](docs/architecture/Sequence%20Diagram/README.md)                    |
| 🎭 **Use-Case Diagram**             | Actors, roles, and system interactions                   | [View](docs/architecture/Use-Case%20Diagram/README.md)                    |

---

## 📄 Documentation & Requirements

| Document                                                                                                                   | Description                                   |
|----------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------|
| [System Requirements (PDF)](docs/requirements/AI-Driven%20Smart%20Recruitment%20%26%20Interview%20Management%20System.pdf) | Full functional & non-functional requirements |
| [Phase 1 Cover Sheet (PDF)](docs/requirements/CS251%20SE-1%20(Group-Project%20Cover%20Sheet)%20-%20Phase%201.pdf)          | Phase 1 deliverables and team declaration     |
| [Phase 2 Cover Sheet (PDF)](docs/requirements/CS251%20SE-1%20(Group-Project%20Cover%20Sheet)%20-%20Phase%202.pdf)          | Phase 2 deliverables and team declaration     |

---

## 🧩 Backend Architecture Deep Dive

NexHire's backend follows a **strict layered MVC** pattern with clear separation enforced through PHP interfaces and abstract classes:

```
Request → public/index.php (Front Controller)
              ↓
         Controller Layer     ← routes & delegates
              ↓
         Service Layer        ← business logic
              ↓
         Model Layer          ← data access & entities
              ↓
         Database (MySQL)
```

--- 

## ✨ Core Modules & Key Features
 
The system is structured around **3 primary user roles** and **42 design functions** spanning 6 functional domains.
 
---
 
### 🏢 HR Admin Module
Manages the full recruitment lifecycle from requisition to onboarding:
- **Job Requisition Approval Workflow** — Multi-tier approval gate before a role goes live
- **Automated Screening Triage** — State-machine driving candidates from `Applied` → `Technical Test` → `Interview` → `Offer`
- **Dynamic Skill-Weighting Engine** — Calculates a "Match Score" per candidate against role-specific skill priorities
- **AI-Ranked Shortlisting** *(Simulated)* — Ranks top 10% of applicants by keyword density and experience years
- **Application Deduplication Logic** — Merges duplicate candidate profiles across applications
- **External Job-Board Sync Manager** — Simulates pushing posts to external platforms and tracking application sources
- **Pipeline Throughput Analytics** — Calculates Time-to-Hire and identifies funnel bottlenecks
- **Offer Package Calculator** — Computes salary components, signing bonuses, and stock options by seniority
- **Digital Offer-Letter Generator** — Populates legal templates with candidate data for e-signature
- **Offer Validity Timer** — Auto-expires unsigned offers after the defined decision window
- **Counter-Offer Negotiation Tracker** — OO tracking of revisions and approvals during salary negotiation
- **Background Check Integration** *(Simulated)* — Tracks external verification status (`Pending`, `Pass`, `Fail`)
- **Pre-Onboarding "Welcome" Portal** — Ensures `Ready-for-Day-1` state with uploaded tax and ID documents
- **Referral Reward Attribution** — Identifies referring employees and triggers referral bonuses after 90 days
 
---
 
### 🎙️ Technical Interviewer Module
Equips interviewers with structured tools for live evaluation and feedback:
- **Interviewer Availability Conflict Resolver** — Matches interviewer and candidate schedules across time zones
- **Multi-Representative Panel Builder** — Ensures balanced Senior Technical and HR representation per panel
- **Automated Interview Briefing Generator** — Compiles resume, test scores, and job requirements into an "Interviewer Pack"
- **Live Coding Environment Sync** — Observer-pattern ensuring real-time code visibility for both parties
- **Interviewer "Shadowing" Logic** — Allows junior staff to observe without affecting candidate score averages
- **Session Extension Protocol** — Adds time to a session on technical issues, requiring admin sign-off
- **Interviewer Load Balancer** — Auto-assigns interviews to staff with the lowest current workload
- **Multi-Dimensional Feedback Aggregator** — Unifies scores across dimensions (Coding, System Design, Culture Fit)
- **Score Normalization Algorithm** — Adjusts for "Interviewer Harshness" trends to ensure fair comparisons
- **Candidate "Red-Flag" Escalation** — Flags ethical or serious concerns for immediate HR review
- **Consensus Meeting Automator** — Triggers debrief only after all panel members submit individual feedback
- **Hiring Recommendation State-Machine** — Transitions candidates to `Strong Hire`, `Hire`, `No Hire`, or `Strong No Hire`
 
---
 
### 🎓 Candidate Module
A self-service portal for candidates throughout the hiring journey:
- **Proctored Environment Controller** — Tracks "Focus-Loss" events (tab switching) during assessments and flags them
- **Randomized Question-Bank Generator** — Pulls questions from tiered difficulty pools for unique per-candidate tests
- **Timed-Session Heartbeat** — Background monitor that auto-submits tests on timer expiry
- **Code-Execution Output Validator** *(Simulated)* — Compares candidate output against hidden test cases
- **Plagiarism Detection Logic** *(Simulated)* — Compares responses against a "Common Answer" database
- **Dynamic Difficulty Adjustment** — Suggests harder/easier follow-up questions based on prior scores
- **Assessment "Cool-down" Manager** — Prevents re-taking a specific test for a defined period (e.g., 6 months)
- **Post-Interview Sentiment Logger** — Tracks candidate experience scores to improve recruitment brand
- **Competency Gap Visualizer** — Spider-chart logic comparing candidate scores against the ideal role profile
 
---
 
### 🔐 System Administration & Compliance
- **Role-Based Access Control (RBAC)** — Interviewers see only assigned candidates; HR sees all
- **Data Retention & "Right to be Forgotten"** — Anonymizes/deletes candidate data after a set period (GDPR-aligned)
- **Diversity & Inclusion Audit Reporter** — Generates anonymized applicant diversity metrics
- **System Audit Trail** — Permanent, non-repudiable log of every status change and score modification
- **Template Versioning Manager** — Ensures all HR staff use the latest job description and rubric versions
- **Database Integrity Manager** — Archives closed requisitions and rejected candidates periodically
- **Automated Notification Escalator** — Observer-pattern reminders if feedback isn't submitted within 24 hours
 
---

### 🔑 Key Design Decisions
- **Contracts (Interfaces):** Every service implements a typed contract, keeping components interchangeable and testable.
- **Abstracts:** Shared base logic for controllers and models is DRY-enforced through abstract classes.
- **Enums:** PHP 8.1 enums enforce type safety for statuses (e.g., `ApplicationStatus`, `InterviewStatus`, `UserRole`).
- **Services:** All business logic lives in the service layer — controllers stay thin, models stay dumb.
- **Single Entry Point:** All HTTP traffic routes through `public/index.php` — no direct file access.

---

## 👥 Team Members & Responsibilities

| Name                  | GitHub                                                             | Module |
|-----------------------|--------------------------------------------------------------------|--------|
| Abdelhalim Yasser     | [@abdelhalimyasser](https://github.com/abdelhalimyasser)           | • ERD |
| Ali Samy              | [@AliSamy12](https://github.com/AliSamy12)                         | - |
| Abdelrahman Alaa      | [@abdelrahmanalaa-3094](https://github.com/abdelrahmanalaa-3094)   | - |
| Nada Moustafa         | [@qNVDV](https://github.com/qNVDV)                                 | - |
| Nourhan Mohamed       | [@Nour-FCAI](https://github.com/Nour-FCAI)                         | - |
| Nessreen Salah        | [@](https://github.com/)                                           | - |

> Fill in team members and their module ownership following the same division of responsibilities pattern used internally.

---

## 🚀 Getting Started

```bash
# 1. Clone the repository
git clone https://github.com/abdelhalimyasser/AI-Driven-Smart-Recruitment-Interview-Management-System.git
cd AI-Driven-Smart-Recruitment-Interview-Management-System

# 2. Set up your local server (Apache / Nginx)
#    Point document root to: /public

# 3. Import the database schema
#    See: docs/architecture/ERD

# 4. Configure environment
cp .env.example .env
# Edit .env with your DB credentials

# 5. Navigate to localhost in your browser
```

---

## 🤝 Contributing

Contributions are welcome from team members following the branching strategy defined in [`CONTRIBUTING.md`](CONTRIBUTING.md).

```
main          ← stable, protected
dev           ← integration branch
feature/*     ← individual feature branches
fix/*         ← bug fixes
```

Please read the [Code of Conduct](CODE_OF_CONDUCT.md) and [Security Policy](SECURITY.md) before contributing.

---

## 📜 License

This project is licensed under the terms described in [`LICENSE`](LICENSE).

---

<p align="center">
  <strong>FCAI – Capital University ~ (Formerly Helwan University)</strong><br>
  Software Engineering 1 · CS-251 · Final Project · 2025/2026<br>
  <br>
  <span>© 2026 <strong>NextHire Team</strong>. All Rights Reserved.</span><br>
  Released under the <a href="LICENSE"><code>LICENSE</code></a>.
</p>
