# NextHire ERD for DataBase
> AI Driven Smart Recruitment Interview Management System
## Summary

- [Database Type](#database-type)
- [Download ERD](#downloads)
- [Table Structure](#table-structure)
	- [user](#user)
	- [skills](#skills)
	- [user_skills](#user_skills)
	- [job](#job)
	- [job_skills](#job_skills)
	- [application](#application)
	- [questions](#questions)
	- [assessment](#assessment)
	- [assessment_question](#assessment_question)
	- [assessment_logs](#assessment_logs)
	- [interviewer_availability](#interviewer_availability)
	- [interview](#interview)
	- [interview_panel](#interview_panel)
	- [feedback](#feedback)
	- [offer](#offer)
	- [counter_offer_tracker](#counter_offer_tracker)
	- [diversity_audit](#diversity_audit)
	- [notification](#notification)
	- [candidate_sentiment](#candidate_sentiment)
	- [audit_logs](#audit_logs)
- [Relationships](#relationships)
- [Database Diagram](#database-diagram)

## Database type

- **Database system:** MySQL
## Downloads
- [PDF](./NextHire-DOCS-ERD-PDF.pdf)
- [Png](./NextHire-ERD-PNG.png)

## Table structure

### user

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique |  | |
| **first_name** | VARCHAR(255) | not null |  | |
| **last_name** | VARCHAR(255) | not null |  | |
| **birth_date** | DATE | not null |  | |
| **email** | VARCHAR(255) | not null, unique |  | |
| **country_code** | VARCHAR(10) | not null |  | |
| **phone_number** | VARCHAR(20) | not null, unique |  | |
| **role** | ENUM | not null, default: Candidate |  | |
| **password_hashed** | VARCHAR(255) | not null |  | |
| **experience_year** | INTEGER | not null, default: 0 |  | |
| **resume_path** | VARCHAR(255) | null |  | |
| **docs** | VARCHAR(255) | null |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### role

- Candidate
- Interviewer
- HR Admin


### skills

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **skill_name** | VARCHAR(255) | not null, unique |  | | 


### user_skills

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **user_id** | BIGINT | 🔑 PK, not null | fk_user_skills_user_id_user | |
| **skill_id** | BIGINT | 🔑 PK, not null | fk_user_skills_skill_id_skills | |
| **proficiency_level** | INTEGER | null, default: 1 |  | | 


### job

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **title** | VARCHAR(255) | not null |  | |
| **department** | VARCHAR(255) | not null |  | |
| **description** | TEXT | not null |  | |
| **status** | ENUM | not null, default: Draft |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### status

- Draft
- Pending Approval
- Active
- Closed
- Archived


### job_skills

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **job_id** | BIGINT | 🔑 PK, not null | fk_job_skills_job_id_job | |
| **skill_id** | BIGINT | 🔑 PK, not null | fk_job_skills_skill_id_skills | |
| **weight** | INTEGER | not null, default: 1 |  |Dynamic Skill-Weighting (1-5) | 


### application

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **job_id** | BIGINT | not null | fk_application_job_id_job | |
| **candidate_id** | BIGINT | not null | fk_application_candidate_id_user | |
| **referred_by** | BIGINT | null | fk_application_referred_by_user | |
| **status** | ENUM | not null, default: Applied |  | |
| **match_score** | INTEGER | not null, default: 0 |  | |
| **referral_bonus_status** | ENUM | null, default: Not Applicable |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### status

- Applied
- Technical Test
- Interview
- Offer
- Hired
- Rejected
##### referral_bonus_status

- Pending
- Paid
- Not Applicable


### questions

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **question** | TEXT | not null |  | |
| **description** | TEXT | not null |  | |
| **category** | ENUM | not null, default: problem solving |  | |
| **recommended_base_answer** | TEXT | null |  | |
| **test_cases** | JSON | not null |  |handel the output of the question |
| **difficulty** | ENUM | not null, default: easy |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### category

- problem solving
- data engineering
- data science
- data analysis
- machine learning
- deep learning
- backend
##### difficulty

- easy
- medium
- hard


### assessment

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **application_id** | BIGINT | not null | fk_assessment_application_id_application | |
| **language** | ENUM | not null, default: python |  | |
| **code** | TEXT | null |  | |
| **plagiarism_score** | INTEGER | null, default: 0 |  | |
| **started_at** | TIMESTAMP | not null |  | |
| **submitted_at** | TIMESTAMP | not null |  | |
| **status** | ENUM | null, default: Pending |  | | 

#### Enums
##### language

- c
- c++
- java
- python
- c#
- php
- js
- ts
- go
- rust
##### status

- Pending
- In Progress
- Completed
- Expired


### assessment_question

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **assessment_id** | BIGINT | 🔑 PK, not null | fk_assessment_question_assessment_id_assessment | |
| **question_id** | BIGINT | 🔑 PK, not null | fk_assessment_question_question_id_questions | | 


### assessment_logs

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **assessment_id** | BIGINT | not null | fk_assessment_logs_assessment_id_assessment | |
| **event_type** | ENUM | not null |  | |
| **timestamp** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### event_type

- focus_loss
- tab_switch
- heartbeat
- error
- submission


### interviewer_availability

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **interviewer_id** | BIGINT | not null | fk_interviewer_availability_interviewer_id_user | |
| **start_time** | DATETIME | not null |  | |
| **end_time** | DATETIME | not null |  | |
| **is_booked** | BOOLEAN | null, default: false |  | | 


### interview

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **application_id** | BIGINT | not null | fk_interview_application_id_application | |
| **scheduled_at** | DATETIME | not null |  | |
| **begined_at** | TIMESTAMP | not null |  | |
| **ended_at** | TIMESTAMP | not null |  | |
| **attended** | BOOLEAN | null, default: false |  | |
| **status** | ENUM | null, default: Scheduled |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### status

- Scheduled
- In Progress
- Completed
- Canceled


### interview_panel

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **interview_id** | BIGINT | 🔑 PK, not null | fk_interview_panel_interview_id_interview | |
| **interviewer_id** | BIGINT | 🔑 PK, not null | fk_interview_panel_interviewer_id_user | |
| **role** | ENUM | not null, default: Technical |  | | 

#### Enums
##### role

- Lead
- Technical
- HR
- Shadow


### feedback

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **interview_id** | BIGINT | not null | fk_feedback_interview_id_interview | |
| **interviewer_id** | BIGINT | not null | fk_feedback_interviewer_id_user | |
| **solved_questions** | INTEGER | not null |  | |
| **problem_solving** | FLOAT | not null, default: 0 |  | |
| **code_cleaning** | FLOAT | not null, default: 0 |  | |
| **code_complexity** | FLOAT | not null, default: 0 |  | |
| **architecture** | FLOAT | not null, default: 0 |  | |
| **self_confidence** | FLOAT | not null, default: 0 |  | |
| **communication** | FLOAT | not null, default: 0 |  | |
| **total** | INTEGER | not null |  | |
| **normalized_score** | FLOAT | null |  |Adjusted for interviewer harshness |
| **red_flag** | BOOLEAN | null, default: false |  |للتصعيد السريع لـ HR |
| **notes** | TEXT | not null |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 


### offer

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null |  | |
| **application_id** | BIGINT | not null | fk_offer_application_id_application | |
| **salary** | DOUBLE | not null |  | |
| **signing_bonus** | DOUBLE | not null, default: 0 |  | |
| **stock_options** | VARCHAR(255) | not null, default: 0 |  | |
| **status** | ENUM | not null, default: Pending |  | |
| **document_path** | VARCHAR(255) | null |  |Digital Offer-Letter Generator |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | |
| **expires_at** | DATETIME | not null |  | | 

#### Enums
##### status

- Pending
- Accepted
- Rejected
- Expired
- Negotiating


### counter_offer_tracker

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **offer_id** | BIGINT | not null | fk_counter_offer_tracker_offer_id_offer | |
| **requested_salary** | DOUBLE | not null |  | |
| **notes** | TEXT | null |  | |
| **status** | ENUM | null, default: Pending Review |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 

#### Enums
##### status

- Pending Review
- Approved
- Declined


### diversity_audit

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **application_id** | BIGINT | not null | fk_diversity_audit_application_id_application | |
| **gender** | ENUM | not null, default: Prefer Not to Say |  | |
| **ethnicity** | ENUM | not null, default: Prefer not to say |  | |
| **disability_status** | BOOLEAN | not null, default: 0 |  | | 

#### Enums
##### gender

- Male
- Female
- Prefer Not to Say
##### ethnicity

- Asian
- African or African American
- Hispanic or Latino
- Caucasian
- Middle Eastern or North African - MENA
- Prefer not to say


### notification

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **send_to** | BIGINT | not null | fk_notification_send_to_user | |
| **message** | TEXT | not null |  | |
| **send_at** | DATETIME | not null |  | |
| **received_at** | DATETIME | not null |  | |
| **read_at** | DATETIME | not null |  | | 


### candidate_sentiment

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, autoincrement |  | |
| **interview_id** | BIGINT | null | fk_candidate_sentiment_interview_id_interview | |
| **platform_overall_experience** | INTEGER | null |  | |
| **interview_score** | INTEGER | null |  | |
| **interview_overall_experience** | INTEGER | null |  | |
| **interviewer_score** | INTEGER | null |  | |
| **questions_variety** | INTEGER | null |  | |
| **questions_overall_score** | INTEGER | null |  | |
| **notes** | TEXT | null |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 


### audit_logs

| Name        | Type          | Settings                      | References                    | Note                           |
|-------------|---------------|-------------------------------|-------------------------------|--------------------------------|
| **id** | BIGINT | 🔑 PK, not null, unique, autoincrement |  | |
| **user_id** | BIGINT | not null | fk_audit_logs_user_id_user | |
| **action** | VARCHAR(255) | not null |  | |
| **table_name** | VARCHAR(100) | not null |  | |
| **record_id** | BIGINT | not null |  | |
| **old_value** | TEXT | null |  | |
| **new_value** | TEXT | null |  | |
| **created_at** | TIMESTAMP | null, default: CURRENT_TIMESTAMP |  | | 


## Relationships

- **user_skills to user**: many_to_one
- **user_skills to skills**: many_to_one
- **job_skills to job**: many_to_one
- **job_skills to skills**: many_to_one
- **application to job**: many_to_one
- **application to user**: many_to_one
- **application to user**: many_to_one
- **assessment to application**: many_to_one
- **assessment_question to assessment**: many_to_one
- **assessment_question to questions**: many_to_one
- **assessment_logs to assessment**: many_to_one
- **interviewer_availability to user**: many_to_one
- **interview to application**: many_to_one
- **interview_panel to interview**: many_to_one
- **interview_panel to user**: many_to_one
- **feedback to interview**: many_to_one
- **feedback to user**: many_to_one
- **offer to application**: many_to_one
- **counter_offer_tracker to offer**: many_to_one
- **diversity_audit to application**: many_to_one
- **notification to user**: many_to_one
- **candidate_sentiment to interview**: many_to_one
- **audit_logs to user**: many_to_one

## Database Diagram

```mermaid
erDiagram
	user_skills }o--|| user : references
	user_skills }o--|| skills : references
	job_skills }o--|| job : references
	job_skills }o--|| skills : references
	application }o--|| job : references
	application }o--|| user : references
	application }o--|| user : references
	assessment }o--|| application : references
	assessment_question }o--|| assessment : references
	assessment_question }o--|| questions : references
	assessment_logs }o--|| assessment : references
	interviewer_availability }o--|| user : references
	interview }o--|| application : references
	interview_panel }o--|| interview : references
	interview_panel }o--|| user : references
	feedback }o--|| interview : references
	feedback }o--|| user : references
	offer }o--|| application : references
	counter_offer_tracker }o--|| offer : references
	diversity_audit }o--|| application : references
	notification }o--|| user : references
	candidate_sentiment }o--|| interview : references
	audit_logs }o--|| user : references

	user {
		BIGINT id
		VARCHAR(255) first_name
		VARCHAR(255) last_name
		DATE birth_date
		VARCHAR(255) email
		VARCHAR(10) country_code
		VARCHAR(20) phone_number
		ENUM role
		VARCHAR(255) password_hashed
		INTEGER experience_year
		VARCHAR(255) resume_path
		VARCHAR(255) docs
		TIMESTAMP created_at
	}

	skills {
		BIGINT id
		VARCHAR(255) skill_name
	}

	user_skills {
		BIGINT user_id
		BIGINT skill_id
		INTEGER proficiency_level
	}

	job {
		BIGINT id
		VARCHAR(255) title
		VARCHAR(255) department
		TEXT description
		ENUM status
		TIMESTAMP created_at
	}

	job_skills {
		BIGINT job_id
		BIGINT skill_id
		INTEGER weight
	}

	application {
		BIGINT id
		BIGINT job_id
		BIGINT candidate_id
		BIGINT referred_by
		ENUM status
		INTEGER match_score
		ENUM referral_bonus_status
		TIMESTAMP created_at
	}

	questions {
		BIGINT id
		TEXT question
		TEXT description
		ENUM category
		TEXT recommended_base_answer
		JSON test_cases
		ENUM difficulty
		TIMESTAMP created_at
	}

	assessment {
		BIGINT id
		BIGINT application_id
		ENUM language
		TEXT code
		INTEGER plagiarism_score
		TIMESTAMP started_at
		TIMESTAMP submitted_at
		ENUM status
	}

	assessment_question {
		BIGINT assessment_id
		BIGINT question_id
	}

	assessment_logs {
		BIGINT id
		BIGINT assessment_id
		ENUM event_type
		TIMESTAMP timestamp
	}

	interviewer_availability {
		BIGINT id
		BIGINT interviewer_id
		DATETIME start_time
		DATETIME end_time
		BOOLEAN is_booked
	}

	interview {
		BIGINT id
		BIGINT application_id
		DATETIME scheduled_at
		TIMESTAMP begined_at
		TIMESTAMP ended_at
		BOOLEAN attended
		ENUM status
		TIMESTAMP created_at
	}

	interview_panel {
		BIGINT interview_id
		BIGINT interviewer_id
		ENUM role
	}

	feedback {
		BIGINT id
		BIGINT interview_id
		BIGINT interviewer_id
		INTEGER solved_questions
		FLOAT problem_solving
		FLOAT code_cleaning
		FLOAT code_complexity
		FLOAT architecture
		FLOAT self_confidence
		FLOAT communication
		INTEGER total
		FLOAT normalized_score
		BOOLEAN red_flag
		TEXT notes
		TIMESTAMP created_at
	}

	offer {
		BIGINT id
		BIGINT application_id
		DOUBLE salary
		DOUBLE signing_bonus
		VARCHAR(255) stock_options
		ENUM status
		VARCHAR(255) document_path
		TIMESTAMP created_at
		DATETIME expires_at
	}

	counter_offer_tracker {
		BIGINT id
		BIGINT offer_id
		DOUBLE requested_salary
		TEXT notes
		ENUM status
		TIMESTAMP created_at
	}

	diversity_audit {
		BIGINT id
		BIGINT application_id
		ENUM gender
		ENUM ethnicity
		BOOLEAN disability_status
	}

	notification {
		BIGINT id
		BIGINT send_to
		TEXT message
		DATETIME send_at
		DATETIME received_at
		DATETIME read_at
	}

	candidate_sentiment {
		BIGINT id
		BIGINT interview_id
		INTEGER platform_overall_experience
		INTEGER interview_score
		INTEGER interview_overall_experience
		INTEGER interviewer_score
		INTEGER questions_variety
		INTEGER questions_overall_score
		TEXT notes
		TIMESTAMP created_at
	}

	audit_logs {
		BIGINT id
		BIGINT user_id
		VARCHAR(255) action
		VARCHAR(100) table_name
		BIGINT record_id
		TEXT old_value
		TEXT new_value
		TIMESTAMP created_at
	}
```
---

<p align="center">
  <strong>FCAI – Capital University ~ (Formerly Helwan University)</strong><br>
  Software Engineering 1 · CS-251 · Final Project · 2025/2026<br>
  <br>
  <span>© 2026 <strong>NextHire Team</strong>. All Rights Reserved.</span><br>
  Released under the <a href="https://github.com/abdelhalimyasser/NextHire-AI-Driven-Smart-Recruitment-Interview-Management-System/blob/main/LICENSE"><code>LICENSE</code></a>.
</p>
